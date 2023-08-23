<?php

// To get the details of Person Officer from "person_appointments" table "person_officer_id" column.

use App\Models\PersonOfficer;

function officer_details_for_appointments_list($id){
    if(isset($id)){

        $officer_details = PersonOfficer::where('id',$id)->get()->toArray();
    
        if(!empty($officer_details)){
            return $officer_details[0];
        }
    }
}
?>