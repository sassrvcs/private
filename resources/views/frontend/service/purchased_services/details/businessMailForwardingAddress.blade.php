<div class="companies-topbar">
    <h3>Form Details</h3>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Particulars</th>
            <th>&nbsp;</th>
            <th>data</th>
            <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody id="order_blk_details">

        <tr>
            <td>Your Start Date</td>
            <td>&nbsp;</td>
            <td>{{date('d-m-Y',strtotime($service_data->start_date))}}</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Company Name</td>
            <td>&nbsp;</td>
            <td>{{$service_data->company_name_first}}</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Company Number</td>
            <td>&nbsp;</td>
            <td>{{$service_data->company_number_first}}</td>
            <td>&nbsp;</td>
        </tr>
    </tbody>
    </table>
