<table class="table">
    <thead>
        <tr>
            <th>Service</th>
            <th>Details</th>
            <th class="numeric">Price</th>
            <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody id="order_blk_details">
        {!!$purchased_service->invoice_data!!}

    </tbody>
    <tbody><tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td class="bc-f0f0f0 br-top-left">&nbsp;</td>
        <td class="bc-f0f0f0">Price excl. VAT</td>
        <td id="totals" class="numeric bc-f0f0f0"><strong>£{{$purchased_service->base_amount}}</strong></td>
        <td class="bc-f0f0f0 br-top-right">&nbsp;</td>
    </tr>
    <tr>
        <td class="bc-f0f0f0">&nbsp;</td>
        <td class="bc-f0f0f0">VAT @ 20%</td>
        <td id="vat_totals" class="numeric bc-f0f0f0"><strong>£{{$purchased_service->vat}}</strong></td>
        <td class="bc-f0f0f0">&nbsp;</td>
    </tr>
    <tr>
        <td class="bc-f0f0f0">&nbsp;</td>
        <td class="bc-f0f0f0">Total for this Transaction</td>
        <td id="grand_totals" class="numeric bc-f0f0f0"><strong>£{{$purchased_service->amount}}</strong></td>
        <td class="bc-f0f0f0">&nbsp;</td>
    </tr>
</tbody></table>
