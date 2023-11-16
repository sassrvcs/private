<div class="companies-topbar">
    <h3>Form Details</h3>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Particulars</th>
            <th>&nbsp;</th>
            <th>Data</th>
            <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody id="order_blk_details">

        <tr>
            <td>Service Type</td>
            <td>&nbsp;</td>
            <td>{{$service_data->director_appintment}}</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Full Name</td>
            <td>&nbsp;</td>
            <td>{{$service_data->full_name}}</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>DOB</td>
            <td>&nbsp;</td>
            <td>
                {{date('d-m-Y',strtotime(@$service_data->director_dob))}}
            </td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Occupation</td>
            <td>&nbsp;</td>
            <td>{{$service_data->director_occupation}}</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Nationality</td>
            <td>&nbsp;</td>
            <td>
                @php
                    $director_nationality = \App\Models\Nationality::where('id',$service_data->director_nationality)->pluck('nationality')->first();
                @endphp
                {{$director_nationality}}</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Service Address</td>
            <td>&nbsp;</td>
            <td>{{$service_data->service_address}}</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Residential Address</td>
            <td>&nbsp;</td>
            <td>{{$service_data->res_address}}</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>{{$service_data->director_appintment}} date</td>
            <td>&nbsp;</td>
            <td>
            {{date('d-m-Y',strtotime(@$service_data->appointment_date))}}
            </td>
            <td>&nbsp;</td>
        </tr>
    </tbody>
    </table>
