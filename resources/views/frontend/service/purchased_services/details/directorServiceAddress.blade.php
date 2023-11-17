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
            <td>Start Date</td>
            <td>&nbsp;</td>
            <td>{{date('d-m-Y',strtotime($service_data->start_date))}}</td>
            <td>&nbsp;</td>
        </tr>
        @if ($slug=="directors-service-address")

        <tr>
            <td>No of officers(directors/shareholders/PSC’s)</td>
            <td>&nbsp;</td>
            <td>{{$service_data->no_of_officer}}</td>
            <td>&nbsp;</td>
        </tr>
        @endif

        <tr>
            <td>DOB</td>
            <td>&nbsp;</td>
            <td>{{date('d-m-Y',strtotime($service_data->date_of_birth))}}</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>&nbsp;</td>
            <td>{{$service_data->stat_email}}</td>
            <td>&nbsp;</td>
        </tr>
    </tbody>
    </table>
