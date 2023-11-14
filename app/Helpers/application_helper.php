<?php

// To get the details of Person Officer from "person_appointments" table "person_officer_id" column.

use App\Models\Address;
use App\Models\Country;
use App\Models\Order;
use App\Models\PersonOfficer;

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
?>
