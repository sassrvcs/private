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
            <td>Date Of Allotment</td>
            <td>&nbsp;</td>
            <td>{{$service_data->date_of_allotment!=''?date('d-m-Y',strtotime(@$service_data->date_of_allotment)):date('d-m-Y',strtotime($purchased_service->created_at))}}</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Details of Allotment (issue of shares)</td>
            <td>&nbsp;</td>
            <td>{{$service_data->details_of_allotment}}</td>
            <td>&nbsp;</td>
        </tr>
    </tbody>
    </table>
