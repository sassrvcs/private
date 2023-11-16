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
        @if (@$service_data->cntDir==null)
        <tr>
            <td>Director 1</td>
            <td>&nbsp;</td>
            <td>{{$service_data->director_1_name}}</td>
            <td>&nbsp;</td>
        </tr>

        @else
        @php
            $count_dir = $service_data->cntDir;
            $arr_service_data = (array)$service_data;
            $count=1;
        @endphp
        @for ($i = 0; $i < $count_dir; $i++)
        @php
            $name = "director_".($i+1)."_name";
        @endphp
            @if (isset($arr_service_data[$name]))
                <tr>
                    <td>Director {{$count}}</td>
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
