<?php

namespace App\Services;

use App\Models\CompanyHouseSensitiveWord;
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
     * Search compant mane as per company name
     * @param  string  $searchText
     * @return 'messsge as per data'
     */
    public function searchCompany($searchText)
    {
        $is_sensitive = 0;
        $is_sensitive_word = '';
        $sensitive_word_desc = '';

        $searchvalue = trim($searchText);
        if (stripos($searchvalue, 'ltd') !== false) {
            $searchvalue = str_ireplace('ltd', "", $searchvalue);
        }
        if (stripos($searchvalue, 'limited') !== false) {
            $searchvalue = str_ireplace('limited', "", $searchvalue);
        }

        $searchapiSrch = str_replace(" ", "", $searchvalue);

        // Use Laravel HTTP Facade to make the request
        $response = Http::withBasicAuth("2e662f83-1085-45ad-a213-738abc18a4ab", "")
            ->get("https://api.company-information.service.gov.uk/search/companies?q=" . $searchapiSrch);

        if ($response->successful()) {
            $response = $response->json();
            // dd($response);
            if( count($response['items']) == 0 ) {

                $companyHouseSensitiveWord = CompanyHouseSensitiveWord::get();
                if( !empty($companyHouseSensitiveWord) ) {
                    foreach($companyHouseSensitiveWord as $words) {
                        $sensitiveWords = $words->name;
                        if (stripos($searchText,$sensitiveWords) !== false) {
                            $is_sensitive = 1;
                            $is_sensitive_word = $words->name;
                            $sensitive_word_desc = $words->description;
                        }
                    }
                    return ['message' => CompanieSearchService::COMPANY_AVAILABLE, 'search_text' => $searchText, 'is_sensitive' => $is_sensitive, 'is_sensitive_word' => $is_sensitive_word, 'sensitive_word_desc' => $sensitive_word_desc];
                } else {
                    return ['message' => CompanieSearchService::COMPANY_AVAILABLE, 'search_text' => $searchText, 'is_sensitive' => $is_sensitive, 'is_sensitive_word' => $is_sensitive_word, 'sensitive_word_desc' => $sensitive_word_desc];
                }

            } else {
                return ['message' => CompanieSearchService::COMPANY_NOT_AVAILABLE, 'search_text' => $searchText, 'is_sensitive'=> $is_sensitive, 'is_sensitive_word' => $is_sensitive_word, 'sensitive_word_desc' => $sensitive_word_desc];
                // return CompanieSearchService::COMPANY_AVAILABLE;
            }
        } else {
            return ['message' => CompanieSearchService::NO_RESPONSE, 'search_text' => $searchText, 'is_sensitive'=> $is_sensitive, 'is_sensitive_word' => $is_sensitive_word, 'sensitive_word_desc' => $sensitive_word_desc];
        }
    }

    /**
     * Search availablity as per company name
     * @param  string  $searchText
     * @return 'messsge as per data'
     */
    public function sameAsCompanyNameSearch($searchText)
    {
        $is_sensitive = 0;
        $is_sensitive_word = '';
        $sensitive_word_desc = '';

        $searchvalue = trim($searchText);
        if (stripos($searchvalue, 'ltd') !== false) {
            $searchvalue = str_ireplace('ltd', "", $searchvalue);
        }

        if (stripos($searchvalue, 'limited') !== false) {
            $searchvalue = str_ireplace('limited', "", $searchvalue);
        }

        $searchapiSrch = str_replace(" ", "", $searchvalue);

        // Use Laravel HTTP Facade to make the request
        $response = Http::withBasicAuth("2e662f83-1085-45ad-a213-738abc18a4ab", "")
            ->get("https://api.company-information.service.gov.uk/search/companies?q=".$searchapiSrch.'&restrictions=active-companies legally-equivalent-company-name');

        if ($response->successful()) {
            $response = $response->json();
            // dd($response);
            if( count($response['items']) == 0 ) {

                $companyHouseSensitiveWord = CompanyHouseSensitiveWord::get();
                if( !empty($companyHouseSensitiveWord) ) {
                    foreach($companyHouseSensitiveWord as $words) {
                        $sensitiveWords = $words->name;
                        if (stripos($searchText,$sensitiveWords) !== false) {
                            $is_sensitive = 1;
                            $is_sensitive_word = $words->name;
                            $sensitive_word_desc = $words->description;
                        }
                    }
                    return ['message' => CompanieSearchService::COMPANY_AVAILABLE, 'items' => [], 'search_text' => $searchText, 'is_sensitive' => $is_sensitive, 'is_sensitive_word' => $is_sensitive_word, 'sensitive_word_desc' => $sensitive_word_desc];
                } else {
                    return ['message' => CompanieSearchService::COMPANY_AVAILABLE, 'items' => [], 'search_text' => $searchText, 'is_sensitive' => $is_sensitive, 'is_sensitive_word' => $is_sensitive_word, 'sensitive_word_desc' => $sensitive_word_desc];
                }
            } else {
                return ['message' => CompanieSearchService::COMPANY_NOT_AVAILABLE, 'items' => $response['items'], 'search_text' => $searchText, 'is_sensitive'=> $is_sensitive, 'is_sensitive_word' => $is_sensitive_word, 'sensitive_word_desc' => $sensitive_word_desc];
            }
        } else {
            return ['message' => CompanieSearchService::NO_RESPONSE, 'search_text' => $searchText, 'is_sensitive'=> $is_sensitive, 'is_sensitive_word' => $is_sensitive_word, 'sensitive_word_desc' => $sensitive_word_desc];
        }
    }
}