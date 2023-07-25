<?php

namespace App\Http\Controllers\Admin\Agent;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Agent\AgentAccessRequest;
use App\Http\Requests\User\Agent\AgentStoreRequest;
use App\Http\Requests\User\MoveToAgentRequest;
use App\Services\User\Agent\BeAgentService;
use App\Services\User\Agent\AgentService;
use Illuminate\Http\Request;
use App\Models\User;

class AgentController extends Controller
{
    public function __construct(
        protected AgentService $agentService,
        protected BeAgentService $beAgentService
    ) { }

    /**
     * Display a listing of the resource.
     * @param AgentAccessRequest
     * @return view
     */
    public function index(AgentAccessRequest $request)
    {
        $filter['form']     = ($request->form) ? $request->form : '';
        $filter['agent_id'] = ($request->agent_id) ? $request->agent_id : '';

        if($request->form == 'received') {
            $users = $this->beAgentService->index($request->validated());
            return view('admin.agent.become-agent-list', compact('users', 'filter'));
        } else {
            $users = $this->agentService->index($request->validated());
            return view('admin.agent.list', compact('users', 'filter'));
        }
    }

    /**
     * Show the form for creating a new agent.
     * @param {NA}
     * @return view
     */
    public function create()
    {
        return view('admin.agent.create');
    }

    /**
     * Store a newly created agents via admin.
     * @param AgentStoreRequest
     * @return User
     */
    public function store(AgentStoreRequest $request)
    {
        $newagent = $this->agentService->store($request->validated());
        if($newagent == AgentService::USER_IS_EXIST) { 
            return redirect()->back()->with('error','Agent is already present.');
        } else {
            return redirect()->back()->with('success','Agent added successfully.');
        }
    }

    /**
     * Display customer to agent move form. If admin approve then move customer to agent and create agent id.
     * @param string $id
     * @return view
     */
    public function show(string $id)
    {
        $user = $this->beAgentService->showCustomer($id);
        $gender = config('fivestar_payment.gender');
        return view('admin.agent.move_to_agent', compact('user', 'gender'));
    }

    /**
     * 
     * @param string $id
     * @return view
     */
    public function edit(string $id)
    {
        $user = $this->beAgentService->showCustomer($id);
        $gender = config('fivestar_payment.gender');
        return view('admin.agent.edit', compact('user', 'gender'));
    }


    /**
     * Update thie agent status active/deactive
     * @param Request $request
     * @param string $id
     * @return response $response
     */
    public function update(Request $request, string $id)
    {
        // dd($request->post());
        $data = [
            'status' => $request->status
        ];

        $id = $request->user_id;

        $response = $this->agentService->changeAgentStatus($data, $id);
        return $response;
    }

    /**
     * Remove agent from database.
     * @param string $id
     */
    public function destroy(string $id)
    {
        $user = $this->agentService->deleteAgent($id);
        // dd($user);
        if($user) {
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * Customer move to agent and generate there AGENT ID by admin.
     * @param MoveToAgentRequest
     * @return Session message
     */
    public function moveToAgent(MoveToAgentRequest $request)
    {
        $user = $this->beAgentService->moveToAgent($request->validated());
        if($user) {
            return redirect()->back()->with('success','New agent has been created.');
        }
    }
}
