<div class="companies-topbar">
    <h3>Customer Details & Address</h3>
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
            <td>{{$service_data->email_addr}}</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Address</td>
            <td>&nbsp;</td>
            <td>{{construct_service_address((array)$service_data)}}</td>
            <td>&nbsp;</td>
        </tr>

        <tr>
            <td>Address line 1</td>
            <td>&nbsp;</td>
            <td>{{$service_data->address_line_1}}</td>
            <td>&nbsp;</td>
        </tr>
        @if (@$service_data->address_line_2)
        <tr>
            <td>Address line 2</td>
            <td>&nbsp;</td>
            <td>{{$service_data->address_line_2}}</td>
            <td>&nbsp;</td>
        </tr>
        @endif
        <tr>
            <td>Invoice Address</td>
            <td>&nbsp;</td>
            <td>
                @if ($service_data->invoice_addr=="Yes")
                    {{"Same as address"}}
                @else
                {{construct_service_invoice_address((array)$service_data)}}</td>
                @endif
            <td>&nbsp;</td>
        </tr>
        @if ($service_data->invoice_addr!="Yes")
        <tr>
            <td>Invoice Address line 1</td>
            <td>&nbsp;</td>
            <td>{{$service_data->invoice_address_line_1}}</td>
            <td>&nbsp;</td>
        </tr>
        @if (@$service_data->invoice_address_line_2)
        <tr>
            <td>Invoice Address line 2</td>
            <td>&nbsp;</td>
            <td>{{$service_data->invoice_address_line_2}}</td>
            <td>&nbsp;</td>
        </tr>
        @endif
        @endif
    </tbody>
    </table>
