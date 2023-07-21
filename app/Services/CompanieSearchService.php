<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

/**
 * @todo work in progress
 * @note extends BaseService
 */
class CompanieSearchService
{
    const COMPANY_NOT_AVAILABLE = 'This company name is Not available.';
    const COMPANY_AVAILABLE = 'This company name is available.';
    const NO_RESPONSE = 'Please try again.';

    /**
     * Verify Credential
     * @param  string  $email_id
     * @param  string  $password
     * @return array first element User or numeric error code, second element token or null
     */
    // public function checkAuth($searchText)
    // {
    //     $client = new \GuzzleHttp\Client();
    // 
    //     $response = $client->request('GET', config('buildium.api.base_url').'rentals/units/listings', [
    //         'headers'        => [
    //             'x-buildium-client-id' => config('buildium.api.secret_key'),
    //             'x-buildium-client-secret' => config('buildium.api.client_key'),
    //             'Content-Type' => 'application/json'
    //         ],
    //         'form_params' => [
    //             'entitytype' => 'RentalOwner',
    //             'entityid' => '1'
    //         ]
    //     ]);
    // 
    //     return json_decode($response->getBody()->getContents(), false);
    // }


    public function searchCompany($searchText)
    {
        $searchapiSrch = str_replace(" ", "", $searchText);

        // Use Laravel HTTP Facade to make the request
        $response = Http::withBasicAuth("2e662f83-1085-45ad-a213-738abc18a4ab", "")
            ->get("https://api.company-information.service.gov.uk/search/companies?q=" . $searchapiSrch);

        if ($response->successful()) {
            $response = $response->json();
            if( !empty($response['items']) ) {
                return CompanieSearchService::COMPANY_NOT_AVAILABLE;
            } else {
                return CompanieSearchService::COMPANY_AVAILABLE;
            }
        } else {
            return CompanieSearchService::NO_RESPONSE;
        }
    }
}