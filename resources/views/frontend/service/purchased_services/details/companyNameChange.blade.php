<div class="companies-topbar">
    <h3>Form Details</h3>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Director</th>
            <th>&nbsp;</th>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody id="order_blk_details">
        <tr>
            <td>Company Name</td>
            <td>&nbsp;</td>
            <td>{{$service_data->company_name}}</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Company Number</td>
            <td>&nbsp;</td>
            <td>{{$service_data->company_number}}</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>New Company Name</td>
            <td>&nbsp;</td>
            <td>{{$service_data->new_company_name}}</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Date of resolution</td>
            <td>&nbsp;</td>
            <td>{{date('d-m-Y',strtotime(@$service_data->date_of_resolution))}}</td>
            <td>&nbsp;</td>
        </tr>
        @if (@$service_data->cntDir==null)
        <tr>
            <td>Shareholder 1</td>
            <td>&nbsp;</td>
            <td>{{$service_data->shareholder_1_name}}</td>
            <td>&nbsp;</td>
        </tr>

        @else
        @php
            $count_dir = $service_data->cntDir;
            $arr_service_data = (array)$service_data;
            // print_r($arr_service_data);
            $count=1;
        @endphp
        @for ($i = 0; $i < $count_dir; $i++)
        @php
            $name = "shareholder_".($i+1)."_name";
            // $name = "shareholder_1_name";
        @endphp
            @if (isset($arr_service_data[$name]))
                <tr>
                    <td>Shareholder {{$count}}</td>
                    <td>&nbsp;</td>
                    <td>{{$arr_service_data[$name]}}</td>
                    <td>&nbsp;</td>
                </tr>
                @php
                    $count++;
                @endphp
            @endif
        @endfor

        @endif


    </tbody>
    </table>
