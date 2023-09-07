<!doctype html>
<html lang="en-US">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Order Invoice</title>
    <meta name="description" content="Reset Password Email Template.">
    <style type="text/css">
        a:hover {text-decoration: underline !important;}
        p{padding: 2px 0;margin: 0;}
    </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; padding: 30px; background-color: #fff;" leftmargin="0">
    <!--100% body table-->
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#fff"
        style="font-family: 'Open Sans', sans-serif; @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');">
        <tr>
            <td>
                <table style="background-color: #fff; margin:0 auto;" width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="padding:0 0 10px; border-bottom:3px solid #000;">
                          <a href="#" title="logo" target="_blank">
                            <img src="{{ storage_path('app/public/logo.png') }}" title="logo" alt="logo" style="max-width: 500px;">
                          </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" style="vertical-align: top; background:#fff; font-family: 'Poppins', sans-serif;">
                                <tr>
                                    <td style="vertical-align: top;">
                                        <p>Customer Ref: 001395910</p>
                                        <p>Invoice Ref: {{ $transaction ? $transaction->invoice_id : '' }}</p>
                                        <p>Order Ref: {{ $order->order_id }}</p>
                                        <p>Invoice Date: {{ $transaction ? \Carbon\Carbon::parse($transaction->created_at)->format('d/m/Y') : '' }}</p>
                                    </td>
                                    <td style="text-align:right;vertical-align: top; color:#646464;font-size: 14px;">
                                        <p>1st Formations</p>
                                        <p>71-75 Shelton Street</p>
                                        <p>London</p>
                                        <p>Greater London</p>
                                        <p>WC2H 9JQ</p>
                                        <p>UNITED KINGDOM</p>
                                        <p>Tel: 02038972233</p>
                                        <p>Email: finance@1stformations.co.uk</p>
                                        <p>Web: https://www.1stformations.co.uk</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>{{ $user->title . ' ' . $user->forename . ' ' . $user->surname }}</p>
                            <p>{{ $billing_address->house_number ?? '' }}</p>
                            <p>{{ $billing_address->street ?? '' }}</p>
                            <p>{{ $billing_address->town ?? '' }}</p>
                            <p>{{ $billing_address->post_code ?? '' }}</p>
                            <p>{{ $billing_address->country ?? '' }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background:#fff; font-family: 'Poppins', sans-serif;">
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding:0">
                                        <h2 style="color:#000; font-weight:700; margin:0;font-size:29px;font-family: 'Poppins', sans-serif; margin-bottom: 20px; text-align: center;">INVOICE</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0;">
                                        <table width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Poppins', sans-serif;">
                                            <tr>
                                                <td colspan="6" style="background:#cdc9c9;padding: 10px;border: 1px solid #000;">
                                                    <strong>{{ $deliveryPartner->companie_name ?? '' }}</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="background:#eee9e9;padding: 10px; border-left: 1px solid #000; border-right: 1px solid #000; border-bottom: 1px solid #000;"><strong><i>Product</i></strong></td>
                                                <td style="background:#eee9e9;padding: 10px;border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: right;"><strong><i>Quantity</i></strong></td>
                                                <td style="background:#eee9e9;padding: 10px;border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: right;"><strong><i>Unit Price</i></strong></td>
                                                <td style="background:#eee9e9;padding: 10px;border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: right;"><strong><i>Net</i></strong></td>
                                                <td style="background:#eee9e9;padding: 10px;border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: right;"><strong><i>VAT</i></strong></td>
                                                <td style="background:#eee9e9;padding: 10px;border-right: 1px solid #000;border-bottom: 1px solid #000; text-align: right;"><strong><i>Gross</i></strong></td>
                                            </tr>

                                            <tr>
                                                <td style="padding: 4px 10px;border-left: 1px solid #000;border-right: 1px solid #000;">
                                                    <strong>{{ $all_order->cart->package->package_name }}</strong>
                                                </td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;"><strong>1</strong></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;">
                                                    <strong>${{ $all_order->cart->package->package_price }}</strong>
                                                </td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;">
                                                    <strong>${{ $all_order->cart->package->package_price }}</strong>
                                                </td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;">
                                                    <strong>${{ ($all_order->cart->package->package_price * 20) / 100 }}</strong>
                                                </td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;">
                                                    <strong>${{ ($all_order->cart->package->package_price) + (($all_order->cart->package->package_price * 20) / 100) }} </strong>
                                                </td>
                                            </tr>

                                            @foreach ($all_order->cart->addonCartServices as $item)
                                                @php
                                                    $net_total = $net_total + $item->service->price;
                                                    $vat = ($item->service->price * 20) / 100;
                                                    $total_vat = $total_vat + $vat;
                                                @endphp
                                                <tr>
                                                    <td style="padding: 4px 10px;border-left: 1px solid #000;border-right: 1px solid #000;font-size:14px;color:#646464;">{{ $item->service->service_name }}</td>
                                                    <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;color:#646464;">1</td>
                                                    <!-- <td><span class="status accepted">Accepted</span></td> -->                                                    
                                                    <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;color:#646464;">${{ $item->service->price }}</td>
                                                    <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;color:#646464;">${{ $item->service->price }}</td>
                                                    <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;color:#646464;">${{ $vat }}</td>
                                                    <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;color:#646464;">${{ ($item->service->price) + $vat }}</td>
                                                </tr> 
                                            @endforeach  

                                            {{--<tr>
                                                <td style="padding: 4px 10px;border-left: 1px solid #000;border-right: 1px solid #000;font-size:14px;color:#646464;">- Limited by Shares Company Formation</td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;color:#646464;">1</td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;color:#646464;"></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;color:#646464;"></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;color:#646464;"></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;color:#646464;"></td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 4px 10px;border-left: 1px solid #000;border-right: 1px solid #000;font-size:14px;color:#646464;">- Email Copy of Certificate of Incorporation</td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;color:#646464;">1</td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;color:#646464;"></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;color:#646464;"></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;color:#646464;"></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;color:#646464;"></td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 4px 10px;border-left: 1px solid #000;border-right: 1px solid #000;font-size:14px;color:#646464;"> - Email Copy of Memorandum & Articles of Association</td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;color:#646464;">1</td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;color:#646464;"></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;color:#646464;"></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;color:#646464;"></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;color:#646464;"></td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 4px 10px;border-left: 1px solid #000;border-right: 1px solid #000;font-size:14px;color:#646464;">- Email Copy of Share Certificate(s)</td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;color:#646464;">1</td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;color:#646464;"></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;color:#646464;"></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;color:#646464;"></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;color:#646464;"></td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 4px 10px;border-left: 1px solid #000;border-right: 1px solid #000;font-size:14px;color:#646464;">- Free .com or .co.uk domain name </td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;color:#646464;">1</td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;color:#646464;"></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;color:#646464;"></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;color:#646464;"></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;color:#646464;"></td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 4px 10px;border-left: 1px solid #000;border-right: 1px solid #000;font-size:14px;"><strong>PSC Help Required</strong></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;"><strong>1</strong></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;"><strong>0.00</strong></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;"><strong>0.00</strong></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;"><strong>0.00</strong></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;"><strong>0.00</strong></td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 4px 10px;border-left: 1px solid #000;border-right: 1px solid #000;font-size:14px;"><strong>Barclays Bank UK PLC</strong></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;"><strong>1</strong></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;"><strong>0.00</strong></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;"><strong>0.00</strong></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;"><strong>0.00</strong></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;"><strong>0.00</strong></td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 4px 10px;border-left: 1px solid #000;border-right: 1px solid #000;font-size:14px;"><strong>Wise UK Business Account</strong></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;"><strong>1</strong></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;"><strong>0.00</strong></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;"><strong>0.00</strong></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;"><strong>0.00</strong></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;"><strong>0.00</strong></td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 4px 10px;border-left: 1px solid #000;border-right: 1px solid #000;font-size:14px;"><strong>Ultimate Guide to Starting Your Business</strong></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;"><strong>1</strong></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;"><strong>0.00</strong></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;"><strong>0.00</strong></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;"><strong>0.00</strong></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;"><strong>0.00</strong></td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 4px 10px;border-left: 1px solid #000;border-right: 1px solid #000;font-size:14px;border-bottom: 1px solid #000;"><strong>Companies House Incorporation Fee </strong></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;border-bottom: 1px solid #000;"><strong>10.00</strong></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;border-bottom: 1px solid #000;"><strong>0.00</strong></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;border-bottom: 1px solid #000;"><strong>0.00</strong></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;border-bottom: 1px solid #000;"><strong>0.00</strong></td>
                                                <td style="padding: 4px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;border-bottom: 1px solid #000;"><strong>0.00</strong></td>
                                            </tr>--}}

                                            <!-- total section -->
                                            <tr>
                                                <td style="padding: 4px 10px;font-size:14px;border-top: 1px solid #000;"><strong></strong></td>
                                                <td style="padding: 4px 10px;text-align: right;font-size:14px;border-top: 1px solid #000;"><strong></strong></td>
                                                <td style="padding: 10px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;border-top: 1px solid #000;">
                                                    <strong>Totals:</strong>
                                                </td>
                                                <td style="padding: 10px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;border-bottom:1px solid #000;border-top: 1px solid #000;">
                                                    <strong>${{ $net_total + $all_order->cart->package->package_price }}</strong>
                                                </td>
                                                <td style="padding: 10px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;border-bottom:1px solid #000;border-top: 1px solid #000;">
                                                    <strong>${{ $total_vat + ($all_order->cart->package->package_price * 20) / 100 }}</strong>
                                                </td>
                                                <td style="padding: 10px 10px;text-align: right;border-right: 1px solid #000;font-size:14px;border-bottom:1px solid #000;border-top: 1px solid #000;">
                                                    @php
                                                        $total_price = $net_total + $all_order->cart->package->package_price + ($total_vat + ($all_order->cart->package->package_price * 20) / 100);
                                                    @endphp                                                   
                                                    <strong>${{ $total_price }}</strong>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:60px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding: 0;">
                                        <table width="100%" cellpadding="0" cellspacing="0" style="background:#fff; font-family: 'Poppins', sans-serif; border:1px solid #000;">
                                            <tr>
                                                <td style="padding:10px;font-size: 14px;">If this invoice is for ongoing services and you have requested us to take payment using the continuous authority credit or debit card details stored on our system, then we will do so and no further action is required</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:80px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding:5px;text-align:center;font-size:16px; color: #646464;">1st Formations Limited, Company Number: 08861249, Vat Number: 185 8695 41</td>
                                </tr>
                                <tr>
                                    <td style="padding:0;text-align:center;font-size:12px;color: #646464;"><strong><i>71-75, Shelton Street, Covent Garden, London, WC2H 9JQ, UNITED KINGDOM</i></strong></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!--/100% body table-->
</body>
</html>