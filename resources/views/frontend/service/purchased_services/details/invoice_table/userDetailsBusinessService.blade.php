<div class="companies-topbar">
    <h3>Customer Details</h3>
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
            <td>Name</td>
            <td>&nbsp;</td>
            <td>{{$service_data->first_name}} {{$service_data->last_name}}</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Phone No</td>
            <td>&nbsp;</td>
            <td>{{$service_data->phone_no}}</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>&nbsp;</td>
            <td>{{$service_data->stat_email}}</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Company Name</td>
            <td>&nbsp;</td>
            <td>{{$service_data->company_name}}</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Company number</td>
            <td>&nbsp;</td>
            <td>{{$service_data->company_number}}</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Details</td>
            <td>&nbsp;</td>
            <td>{{$service_data->details}}</td>
            <td>&nbsp;</td>
        </tr>
    </tbody>
    </table>
