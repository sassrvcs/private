<?php

namespace App\Http\Controllers;

use App\Mail\AdminTicketReplay;
use App\Models\Ticket;
use App\Models\Ticket_replie;
use App\Models\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::with(['ticket_replie'=>function($query){
           return $query->where('replay_by', 'admin')->where('read_by', null)->orderBy('created_at','desc')->get();
        }])->where('is_closed', 0)->where('user_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(25);
        // dd($tickets);
        return view('frontend.tickets.ticket_list', compact('tickets'));
    }
    function view_tickets_admin()
    {
        $tickets = Ticket::with(['ticket_replie'=>function($query){
            return $query->where('replay_by', 'customer')->where('read_by', null)->orderBy('created_at','desc')->get();
        }])->where('is_closed', 0)->orderBy('id', 'desc')->paginate(25);
        return view('admin.tickets.ticket_list', compact('tickets'));
    }

    public function add_ticket_replies(Request $request)
    {
        $request->validate([
            'replies' => 'required'
        ]);

        $role = $this->get_role();
        $ticketId = $request->id;
        $replies = new Ticket_replie();
        $replies->ticket_id = $ticketId;
        $replies->replay_by = $role;
        $replies->read_by=null;
        $replies->replies = $request->replies;
        $replies->save();
        if($role=='admin')
        {
            $details=['name'=>$request->customer_name,'refId'=>$request->refId,'replay'=>$request->replies];
            try {
                Mail::to($request->email)->send(new AdminTicketReplay($details));
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
        return back();
    }
    public function view_ticket_replies(Request $request, $id)
    {
        $role = $this->get_role();

        if($role=='customer')
        {
            Ticket_replie::where('ticket_id', $id)->where('replay_by','admin')->update(['read_by' => now()->format('Y-m-d H:i:s')]);
        }
        if($role=='admin')
        {
            Ticket_replie::where('ticket_id', $id)->where('replay_by','customer')->update(['read_by' => now()->format('Y-m-d H:i:s')]);
        }
        $ticketId = $id;
        $ticket_details = Ticket::with('user')->where('id', $ticketId)->first();
        $replies = Ticket_replie::where('ticket_id', $ticketId)->get();
        if($role=='admin')
        {
        return view('admin.tickets.ticket_replies', compact('replies','ticket_details','id'));

        }
        return view('frontend.tickets.ticket_replies', compact('replies','ticket_details','id'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.tickets.create_ticket');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'subject' => 'max:50|required',
            'phone' => [
                'required',
                'numeric',
                'digits:10',
                'digits_between:8,13',
                function ($attribute, $value, $fail) {
                    $startsWith = '0'; // Specify the value you want to exclude as the starting characters
                    if (strpos($value, $startsWith) === 0) {
                        $fail($attribute . " no can't start with " . $startsWith);
                    }
                },
            ],
            'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|email',
            'description' => 'required',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        } else {
            $ticket = new Ticket();
            $ticket->user_id = auth()->user()->id;
            $ticket->subject = $request->subject;
            $ticket->refId =  uniqid();
            $ticket->phone = $request->phone;
            $ticket->email = $request->email;
            $ticket->description = $request->description;
            $ticket->save();
            return redirect()->route('ticket.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function get_role()
    {
        if (auth()->user()->hasRole(User::CUSTOMER)) {
            $role = 'customer';
        }
        if (auth()->user()->hasRole(User::SUPERADMIN) || auth()->user()->hasRole(User::SUBADMIN)) {
            $role = 'admin';
        }
        return $role;
    }
}
