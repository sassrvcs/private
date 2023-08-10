<?php

namespace App\Http\Controllers\Web\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CompanieFormAccessRequest;
use App\Http\Requests\Company\CompanieStoreRequest;
use App\Models\Companie;
use App\Models\Jurisdiction;
use App\Models\Order;
use App\Services\CompanieSearchService;
use App\Services\Company\CompanyFormSteps\CompanyFormService;
use App\Services\MediaUploadService;
use Exception;
use Illuminate\Http\Request;

class CompanieFormController extends Controller
{
    public function __construct(
        protected CompanyFormService $companyFormService,
        protected CompanieSearchService $companieSearchService
    ) { }

    /**
     * Companie form steps
     * @param CompanieFormAccessRequest
     */
    public function index(CompanieFormAccessRequest $request)
    {
        $userID = auth()->user()->id;
        $orders = Order::with('user')->where('order_id', $request->order)->first();
        $companyFormationStep = Companie::with('sicCodes')->where('companie_name', 'LIKE', '%' . $orders->company_name . '%')->first();

        // dd($companyFormationStep);
        $jurisdictions = Jurisdiction::get();

        $SICDetails = config('sic_code.sic_details');
        $SICCodes = config('sic_code.sic_code');

        $documentName   = $orders->getFirstMedia('sensetive-document')->file_name ?? '';
        $documentUrl    = $orders->getFirstMedia('sensetive-document')->getUrl() ?? '';

        $mediaDoc = [
            'name' => $documentName,
            'url'  => $documentUrl,
        ];

        // dd($mediaDoc);
        if($companyFormationStep == null) {

            return view('frontend.company_form.perticulers', compact('orders', 'mediaDoc', 'companyFormationStep', 'jurisdictions', 'SICDetails', 'SICCodes'));
        } 
        else {
            if( isset($request->data) && $request->data == 'previous') {
                // dd($request->data);
                return view('frontend.company_form.perticulers', compact('orders', 'mediaDoc', 'companyFormationStep', 'jurisdictions', 'SICDetails', 'SICCodes'));
            }

            if($companyFormationStep->step_name == 'particulars') {
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

        if($request->c_availablity == 'not_available') {
            // dd('dasdsadsa');
            return back()->with('error', 'This company is not available');
        } else {
            $company = $this->companieSearchService->searchCompany($request->companie_name);

            if($company['message'] === CompanieSearchService::COMPANY_NOT_AVAILABLE) {
                return back()->with('error', "This company is not available");
            } else if($company['is_sensitive'] === 1) {
                return back()->with('error', 'This '.strtoupper($request->companie_name).' company is case sensitive');
            }
        }

        //FORMATIONSHUNT LTD 
        try {
            $companyForm = $this->companyFormService->companyFormStep1($request->validated());
        
            if($companyForm) {
                return redirect(route('registered-address', ['order' => $request->order, 'section' => 'Company_formaction', 'step' => 'particulars']));
            }
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function storeImage(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'document' => 'required|file|mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ]);

        // Get the model instance where you want to attach the media
        $model = Order::find($request->input('model_id'));
        
        $prevProfileImage  = $model->getFirstMedia('sensetive-document');
        if ($prevProfileImage) {
            $prevProfileImage->delete();
        }

        $model->addMediaFromRequest('document')->toMediaCollection('sensetive-document');
        
        return response()->json([
            'message' => 'File uploaded successfully.',
        ]);
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
            return redirect(route('business-essential.index', ['order' => $request->order_id, 'section' => 'BusinessEssential', 'step' => 'business-banking']));
        } else {
            return response()->json([
                'message' => 'File uploaded successfully.',
            ]);
        }
    }
}