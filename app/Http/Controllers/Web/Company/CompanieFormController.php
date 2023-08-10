<?php

namespace App\Http\Controllers\Web\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CompanieFormAccessRequest;
use App\Http\Requests\Company\CompanieStoreRequest;
use App\Models\Companie;
use App\Models\Jurisdiction;
use App\Models\Order;
use App\Services\Company\CompanyFormSteps\CompanyFormService;
use Illuminate\Http\Request;

class CompanieFormController extends Controller
{
    public function __construct(protected CompanyFormService $companyFormService)
    { }

    /**
     * Companie form steps
     * @param CompanieFormAccessRequest
     */
    public function index(CompanieFormAccessRequest $request)
    {
        $userID = auth()->user()->id;
        $orders = Order::with('user')->where('order_id', $request->order)->first();
        $CompanyFormationStep = Companie::where('companie_name', 'LIKE', '%' . $orders->company_name . '%')->first();

        // dd($CompanyFormationStep);
        $jurisdictions = Jurisdiction::get();

        $SICDetails = config('sic_code.sic_details');
        $SICCodes = config('sic_code.sic_code');

        if($CompanyFormationStep == null) {

            return view('frontend.company_form.perticulers', compact('orders', 'jurisdictions', 'SICDetails', 'SICCodes'));
        } 
        else {
            if( isset($request->data) && $request->data == 'previous') {
                // dd($request->data);
                return view('frontend.company_form.perticulers', compact('orders', 'jurisdictions', 'SICDetails', 'SICCodes'));
            }

            if($CompanyFormationStep->step_name == 'particulars') {
                // return redirect(route('registered-address'));
                // return redirect(route('companyname.document', ['order' => ]));
            } 
            // else if($CompanyFormationStep->step_name == '') {
            // } 
            else {
                // dd('Work In Progress.....');
            }
        }
    }

    /**
     * Store company information and send next step
     * @param CompanieStoreRequest
     */
    public function store(CompanieStoreRequest $request)
    {
        // dd($request->validated());
        $companyForm = $this->companyFormService->companyFormStep1($request->validated());

        if($companyForm) {
            return redirect(route('registered-address'));
        }
    }

    public function updateCompanieName(CompanieFormAccessRequest $request)
    {
        dd($request->validated());
    }

    /**
     * load view legal documents
     * @param CompanieFormAccessRequest
     */
    public function companyDocuments(CompanieFormAccessRequest $request)
    {
        $companieName = $this->companyFormService->getCompanieName($request->order);
        // dd($companieName->getFirstMedia('documents')->file_name);
        $orderId        = $request->order ?? '';
        $companyId      = $companieName->id ?? '';
        $legalDocument  = $companieName->legal_document ?? '';
        $documentName   = $companieName->getFirstMedia('documents')->file_name ?? '';
        $documentUrl    = $companieName->getFirstMedia('documents')->getUrl() ?? '';

        $mediaDoc = [
            'name' => $documentName,
            'url'  => $documentUrl,
        ];

        return view('frontend.company_form.document', compact('orderId', 'companyId', 'legalDocument', 'mediaDoc'));
    }

    /**
     * Update companie documents
     * @param Request
     */
    public function uploadCompanyDocuments(Request $request)
    {
        // dd($request->all());
        // Validate the request (optional but recommended)
        $request->validate([
            'document' => 'nullable|file',
        ]);

        $companyID = (!empty($request->company_id)) ? $request->company_id : $request->input('model_id');

        // Get the model instance where you want to attach the media
        $company = Companie::find($companyID);
        // dd($company);

        $company->legal_document = $request->legal_document;

        if(isset($request->section_name) && !empty($request->section_name)) {
            $company->section_name = $request->section_name;
            $company->step_name    = $request->step_name;
        }

        $company->save();
        
        if($request->input('legal_document') == 'byspoke_article') {
            if ($request->hasFile('document')) {
                // Attach the uploaded file to the model using Laravel Media Library
                $company->addMediaFromRequest('document')->toMediaCollection('documents');
            }
        } else {
            $companyMedia = $company->getMedia('documents')->first();
            // Delete the media
            $companyMedia->delete();
        }
        if(isset($request->step_name) && !empty($request->step_name)) {
            return redirect(route('business-essential.index', ['order' => $request->order_id, 'section' => 'BusinessEssential', 'step_name' => 'business-banking']));
        }else {
            return response()->json([
                'message' => 'File uploaded successfully.',
            ]);
        }
    }
}