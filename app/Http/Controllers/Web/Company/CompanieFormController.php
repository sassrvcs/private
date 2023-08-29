<?php

namespace App\Http\Controllers\Web\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CompanieFormAccessRequest;
use App\Http\Requests\Company\CompanieStoreRequest;
use App\Models\Companie;
use App\Models\Jurisdiction;
use App\Models\Order;
use App\Models\companyFormStep;
use App\Services\CompanieSearchService;
use App\Services\Company\CompanyFormSteps\CompanyFormService;
use App\Services\MediaUploadService;
use Exception;
use Illuminate\Support\Facades\Validator;
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

        // dd($orders);
        $companyFormationStep = Companie::with('sicCodes')->where('companie_name', 'LIKE', '%' . $orders->company_name . '%')->first();

        // dd($companyFormationStep);
        $jurisdictions = Jurisdiction::get();

        $SICDetails = config('sic_code.sic_details');
        $SICCodes = config('sic_code.sic_code');

        $sensitiveFirstMedia = $orders->getFirstMedia('sensetive-document');
        // dd($firstMedia);
        $sameAsFirstMedia = $orders->getFirstMedia('same-as-name-document');

        if($sensitiveFirstMedia) {
            $documentName = $sensitiveFirstMedia ? $sensitiveFirstMedia->file_name : '';
            $documentUrl = $sensitiveFirstMedia ? $sensitiveFirstMedia->getUrl() : '';
        } else {
            $documentName = $sameAsFirstMedia ? $sameAsFirstMedia->file_name : '';
            $documentUrl = $sameAsFirstMedia ? $sameAsFirstMedia->getUrl() : '';
        }

        $mediaDoc = [
            'name' => $documentName,
            'url'  => $documentUrl,
        ];

        // return view('frontend.company_form.perticulers', compact('orders', 'mediaDoc', 'companyFormationStep', 'jurisdictions', 'SICDetails', 'SICCodes'));

        if($companyFormationStep == null) {
            return view('frontend.company_form.perticulers', compact('orders', 'mediaDoc', 'companyFormationStep', 'jurisdictions', 'SICDetails', 'SICCodes'));
        } else {
            if( isset($request->data) && $request->data == 'previous') {
                return view('frontend.company_form.perticulers', compact('orders', 'mediaDoc', 'companyFormationStep', 'jurisdictions', 'SICDetails', 'SICCodes'));
            }

            if($companyFormationStep->step_name == 'particulars') {
                return redirect(route('registered-address', ['order' => $request->order, 'section' => 'Company_formaction', 'step' => 'register-address']));
            }else if($companyFormationStep->step_name == 'register-address') {
                return redirect(route('choose-address-business', ['order' => $request->order, 'section' => 'Company_formaction', 'step' => 'business-address']));
            }else if($companyFormationStep->step_name == 'business-address') {
                return redirect( route('appointments', ['order' => $_GET['order'] ?? '', 'section' => 'Company_formaction', 'step' => 'appointments']));
            }else if($companyFormationStep->step_name == 'appointments') {
                return redirect(route('companyname.document', ['order' => $_GET['order'] ?? '', 'section' => 'Company_formaction', 'step' => 'documents']));
            }else if($companyFormationStep->step_name == 'document') {
                return redirect(route('business-essential.index', ['order' => $request->order_id, 'section' => 'BusinessEssential', 'step' => 'business-banking']));
            } else if($companyFormationStep->step_name == 'business-banking') {
                return redirect(route('business-essential.index', ['order' => $request->order, 'section' => 'BusinessEssential', 'step' => 'business-services']));
            } else if($companyFormationStep->step_name == 'business-service') {
                return redirect(route('business-essential.index', ['order' => $request->order, 'section' => 'BusinessEssential', 'step' => 'optional-extras']));
            } else if($companyFormationStep->step_name == 'other-extras') {
                return redirect(route('review.index', ['order' => $request->order, 'section' => 'Review', 'step' => 'review']));
            } else if($companyFormationStep->step_name == 'review') {
                return redirect(route('review.index', ['order' => $request->order, 'section' => 'Review', 'step' => 'review']));
            } else {
                // dd('Work In Progress..... URL not set now...');
                return redirect(route('registered-address', ['order' => $request->order, 'section' => 'Company_formaction', 'step' => 'register-address']));
            }
        }
    }

    /**
     * Store company information and send next step
     * @param CompanieStoreRequest
     */
    public function store(CompanieStoreRequest $request)
    {
        $validate = Validator::make($request->all(), [
            'companie_name' => 'required',
            'companie_type' => 'required',
            'sic_name'      => 'nullable',
            'sic_code'      => 'required',
        ]);

        if($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        if($request->c_availablity == 'not_available') {
            return back()->with('error', 'This company is not available');
        } else {
            // Recheck companie name available or not available when company submitted
            $company = $this->companieSearchService->sameAsCompanyNameSearch($request->companie_name);
            if($company['message'] === CompanieSearchService::COMPANY_NOT_AVAILABLE && $request->same_as_name_documents == 'false') {
                return back();
            } else if($company['is_sensitive'] === 1 && $request->sesitive_documents == 'false') {
                return back();
            }
        }

        try {
            $companyForm = $this->companyFormService->companyFormStep1($request->validated());
            if($companyForm) {
                return redirect(route('registered-address', ['order' => $request->order, 'section' => 'Company_formaction', 'step' => 'particulars']));
            }
        } catch (Exception $e) {
            dd($e);
        }
    }

    /**
     * Upload file for company | order
     * @param Request $request
     * @param Response $response
     * @todo Need to check implementession and add view button if file exists
     */
    public function storeImage(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'document' => 'required|file|mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ]);

        // Get the model instance where you want to attach the media
        $model = Order::find($request->input('model_id'));
        $collectionName = $request->input('collection_name');

        $prevProfileImage  = $model->getFirstMedia($collectionName);
        if ($prevProfileImage) {
            $prevProfileImage->delete();
        }

        $model->addMediaFromRequest('document')->toMediaCollection($collectionName);

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

        // $document = $companieName->getFirstMedia('documents');
        $document = $companieName->getMedia('documents')
        ->sortByDesc('updated_at')
        ->first();

        if ($document) {
            $documentName = $document->file_name;
            $documentUrl = $document->getUrl();
        } else {
            $documentName = '';
            $documentUrl = '';
        }

        // $documentName   = $companieName->getFirstMedia('documents')->file_name ?? '';
        // $documentUrl    = $companieName->getFirstMedia('documents')->getUrl() ?? '';

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

        // Validate the request (optional but recommended)
        $request->validate([
            'document' => 'nullable|file',
        ]);


        $companyID = (!empty($request->company_id)) ? $request->company_id : $request->input('model_id');

        // Get the model instance where you want to attach the media
        $company = Companie::find($companyID);
        // dd($company);

        $company->legal_document = $request->legal_document;

        $exist_order = companyFormStep::where('order', $request->order_id)->where('section', 'company_formation')->where('step', 'document')->first();
        if(!$exist_order){
            $order = Order::where('order_id',$request->order_id)->pluck('id')->first();
            $companyFormStep = new companyFormStep;
            $companyFormStep->order = $request->order_id;
            $companyFormStep->order_id = $order;
            $companyFormStep->company_id  = $request->company_id;
            $companyFormStep->section  = 'company_formation';
            $companyFormStep->step  = 'document';

            $companyFormStep->save();

            if(isset($request->section_name) && !empty($request->section_name)) {
                $company->section_name = $request->section_name;
                $company->step_name    = $request->step_name;
            }
        }



        $company->save();

        if($request->input('legal_document') == 'byspoke_article') {
            if ($request->hasFile('document')) {
                // Attach the uploaded file to the model using Laravel Media Library
                $company->addMediaFromRequest('document')->toMediaCollection('documents');
            }
        } else {
            $companyMedia = $company->getMedia('documents')->first();

            // Delete the media if exist
            if ($companyMedia) {
                $companyMedia->delete();
            }
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
