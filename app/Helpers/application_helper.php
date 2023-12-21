<?php

// To get the details of Person Officer from "person_appointments" table "person_officer_id" column.

use App\Models\Address;
use App\Models\Country;
use App\Models\Order;
use App\Models\Package;
use App\Models\PersonOfficer;
use App\Models\User;

function officer_details_for_appointments_list($id){
    if(isset($id)){

        $officer_details = PersonOfficer::where('id',$id)->get()->toArray();

        if(!empty($officer_details)){
            return $officer_details[0];
        }
    }
}
function construct_address($address)
{
    @$con_address = '';
        if(@isset($address['house_number']) && @$address['house_number']!='')
        {
            @$con_address .= $address['house_number'].', ';
        }
        if(isset($address['street']) && @$address['street']!='')
        {
            @$con_address .= $address['street'].', ';
        }
        if(isset($address['locality'])&& @$address['locality']!='')
        {
            @$con_address .= $address['locality'].', ';
        }
        if(isset($address['town'])&&@$address['town']!='')
        {
            @$con_address .= $address['town'].', ';
        }
        if(isset($address['county'])&&@$address['county']!='')
        {
            @$con_address .= $address['county'].', ';
        }
        if(isset($address['post_code'])&&@$address['post_code']!='')
        {
            @$con_address .= $address['post_code'];
        }
        if(isset($address['billing_country'])&&@$address['billing_country']!='')
        {
            $billing_country = Country::where('id',$address['billing_country'])->first();
            @$con_address .= ','.$billing_country->name;
        }
        return $con_address;
}
function construct_service_address($address)
{
    @$con_address = '';
    if(@isset($address['name_or_company']) && @$address['name_or_company']!='')
        {
            @$con_address .= $address['name_or_company'].', ';
        }
        if(@isset($address['house_no']) && @$address['house_no']!='')
        {
            @$con_address .= $address['house_no'].', ';
        }
        if(isset($address['street']) && @$address['street']!='')
        {
            @$con_address .= $address['street'].', ';
        }
        if(isset($address['locality'])&& @$address['locality']!='')
        {
            @$con_address .= $address['locality'].', ';
        }
        if(isset($address['town'])&&@$address['town']!='')
        {
            @$con_address .= $address['town'].', ';
        }
        if(isset($address['county'])&&@$address['county']!='')
        {
            @$con_address .= $address['county'].', ';
        }
        if(isset($address['postal_code'])&&@$address['postal_code']!='')
        {
            @$con_address .= $address['postal_code'];
        }
        if(isset($address['personal_country_addr'])&&@$address['personal_country_addr']!='')
        {
            $billing_country = Country::where('id',$address['personal_country_addr'])->first();
            @$con_address .= ','.$billing_country->name;
        }
        return $con_address;
}

function construct_service_invoice_address($address)
{
    @$con_address = '';
    if(@isset($address['invoice_name_or_company']) && @$address['invoice_name_or_company']!='')
        {
            @$con_address .= $address['invoice_name_or_company'].', ';
        }
        if(@isset($address['invoice_house_no']) && @$address['invoice_house_no']!='')
        {
            @$con_address .= $address['invoice_house_no'].', ';
        }
        if(isset($address['invoice_street']) && @$address['invoice_street']!='')
        {
            @$con_address .= $address['invoice_street'].', ';
        }
        if(isset($address['invoice_locality'])&& @$address['invoice_locality']!='')
        {
            @$con_address .= $address['invoice_locality'].', ';
        }
        if(isset($address['invoice_town'])&&@$address['invoice_town']!='')
        {
            @$con_address .= $address['invoice_town'].', ';
        }
        if(isset($address['invoice_county'])&&@$address['invoice_county']!='')
        {
            @$con_address .= $address['invoice_county'].', ';
        }
        if(isset($address['invoice_postal_code'])&&@$address['invoice_postal_code']!='')
        {
            @$con_address .= $address['invoice_postal_code'];
        }
        if(isset($address['invoice_country'])&&@$address['invoice_country']!='')
        {
            $billing_country = Country::where('id',$address['invoice_country'])->first();
            @$con_address .= ','.$billing_country->name;
        }
        return $con_address;
}
function registered_address_included($order_id)
{
    $order = Order::where('order_id', $order_id)->first();
        if ($order->cart->package!=null) {
        $package_name = $order->cart->package->package_name;
        }else{
            $package_name = null;
        }
     if((stripos($package_name, 'Eseller') !== false || stripos($package_name, 'Residents') !== false))
     {
        return 1;
     }
     return 0;
}
function business_address_included($order_id)
{
        $order = Order::where('order_id', $order_id)->first();
        if ($order->cart->package!=null) {
        $package_name = $order->cart->package->package_name;
        }else{
            $package_name = null;
        }
        if((stripos($package_name, 'Eseller') !== false || stripos($package_name, 'Residents') !== false))
        {
        return 1;
        }
        return 0;
}
function appointment_address_included($order_id)
{
    $order = Order::where('order_id', $order_id)->first();
        if ($order->cart->package!=null) {
        $package_name = $order->cart->package->package_name;
        }else{
            $package_name = null;
        }
     if((stripos($package_name, 'Eseller') !== false || stripos($package_name, 'Residents') !== false))
     {
        return true;
     }
     return 0;
}
 function get_role()
    {
        if (auth()->user()->hasRole(User::CUSTOMER)) {
            $role = 'customer';
        }
        if (auth()->user()->hasRole(User::SUPERADMIN) || auth()->user()->hasRole(User::SUBADMIN)) {
            $role = 'admin';
        }
        return $role;
    }
function digital_package_price()
{
    $package = Package::where('package_name','REGEXP','Digital')->first();
    return $package->package_price;
}
?>
