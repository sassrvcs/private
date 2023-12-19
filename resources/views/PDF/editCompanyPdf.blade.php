<!doctype html>
<html lang="en-US">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Order Invoice</title>
    <meta name="description" content="Reset Password Email Template.">
    <style type="text/css">
        a:hover {
            text-decoration: underline !important;
        }

        p {
            padding: 2px 0;
            margin: 0;
        }
        .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .table th {
        background-color: #f5f5f5;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .table tbody tr:hover {
        background-color: #f1f1f1;
    }

    .table tfoot td {
        background-color: #f0f0f0;
        font-weight: bold;
    }
    .order-table tr td{
        padding: 10px 10px;
        border-bottom: 1px solid #000;
        border-right: 1px solid #000;
    }
    .order-table tr td:first-child{
        border-left: 1px solid #000;
    }
    </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; padding: 0 20px 20px; background-color: #fff;"
    leftmargin="0">
    <!--100% body table-->
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#fff"
        style="font-family: 'Open Sans', sans-serif; @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');">
        <thead>
            <tr>
                <th style="padding:0;text-align: left;">
                    <a href="#" title="logo" target="_blank">
                        <img src="{{ storage_path('app/public/pdf_logo.png') }}" title="logo" alt="logo"
                            style="max-width: 360px;">
                    </a>
                </th>
                <th style="vertical-align: top; color:#646464;font-size: 14px;padding:0;text-align: left;">
                    <div style="display: table;margin: 0 0 0 auto;">
                    <p>Formations Hunt</p>
                    <p>7, Thurlow Gardens, Wembley,</p>
                    <p>Middlesex, HA0 2AH</p>
                    <p>United Kingdom</p>
                    <p>Tel: 0203 002 0032</p>
                    <p>Email: contact@formationshunt.co.uk</p>
                    <p>Web: https://formationshunt.co.uk/</p>
                    </div>
                </th>
            </tr>
            <tr>
                <th style="padding:0 0 10px; border-bottom:3px solid #000;" colspan="2">
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="height:20px;" colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td style="font-size: 14px;color: #000;vertical-align: top;">
                    <p>{{ $user->title . ' ' . $user->forename . ' ' . $user->surname }}</p>
                    <p>{{ $address }}</p>

                </td>
                <td style="font-size: 14px;color: #000;vertical-align: top;">
                    <div style="display: table;margin: 0 0 0 auto;">

                        <p>Invoice Ref: </p>
                        <p>Order Ref: </p>
                        <p>Invoice Date:

                        </p>
                    </div>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0"
                        style="background:#fff; font-family: 'Poppins', sans-serif;">
                        <tr>
                            <td style="height:40px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="padding:0">
                                <h2
                                    style="color:#000; font-weight:700; margin:0;font-size:29px;font-family: 'Poppins', sans-serif; margin-bottom: 20px; text-align: center;">
                                    INVOICE</h2>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 0;">

                            </td>
                        </tr>
                        <tr>
                            <td style="height:60px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <table width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Poppins', sans-serif;">
                                    <thead>
                                        <tr>
                                            <th style="text-align:left;background:#eee9e9;padding: 10px;border-top: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000; border-bottom: 1px solid #000;"><strong><i>Items</i></strong></th>
                                            <th style="text-align:left;background:#eee9e9;padding: 10px;border-top: 1px solid #000;border-right: 1px solid #000;border-bottom: 1px solid #000;"><strong><i>Price</i></strong></th>
                                            {{-- <th style="text-align:left;background:#eee9e9;padding: 10px;border-top: 1px solid #000;border-right: 1px solid #000;border-bottom: 1px solid #000;"><strong><i>Vat</i></strong></th> --}}
                                        </tr>
                                        @foreach ($cart_items as $item)
                                        <tr>
                                            <td style="padding:10px;border-left: 1px solid #000;border-right: 1px solid #000;border-bottom: 1px solid #000;">{{$item->service_name}}</td>
                                            <td style="padding:10px;border-right: 1px solid #000;border-bottom: 1px solid #000;">{{$item->price!=null?$item->price:0.00}}</td>
                                            {{-- <td style="padding:10px;border-right: 1px solid #000;border-bottom: 1px solid #000;">{{$item->vat!=null?$item->vat:0.00}}</td> --}}
                                        </tr>
                                        @endforeach

                                    </thead>
                                    <tbody class="order-table">
                                        {{-- {!!$invoice_data!!} --}}
                                        {{-- <tr>
                                            <td></td>
                                            <td style="padding:10px;border-left: 1px solid #000;border-right: 1px solid #000;border-bottom: 1px solid #000;"> <strong>Price excl. VAT</strong> </td>
                                            <td style="padding:10px;border-right: 1px solid #000;border-bottom: 1px solid #000;"><strong>£100</strong></td>
                                        </tr> --}}
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            {{-- <td></td> --}}
                                            <td style="padding:10px;border-left: 1px solid #000;border-right: 1px solid #000;border-bottom: 1px solid #000;"> <strong>Price excl. VAT</strong> </td>
                                            <td style="padding:10px;border-right: 1px solid #000;border-bottom: 1px solid #000;"><strong>£{{$amount_details['base_amount']}}</strong></td>
                                        </tr>
                                        <tr>
                                            {{-- <td></td> --}}
                                            <td style="padding:10px;border-left: 1px solid #000;border-right: 1px solid #000;border-bottom: 1px solid #000;"><strong>VAT @ 20%</strong> </td>
                                            <td style="padding:10px;border-right: 1px solid #000;border-bottom: 1px solid #000;"><strong>£{{$amount_details['vat']}}</strong></td>
                                        </tr>
                                        <tr>
                                            {{-- <td></td> --}}
                                            <td style="padding:10px;border-left: 1px solid #000;border-right: 1px solid #000;border-bottom: 1px solid #000;"><strong>Total for this Transaction</strong> </td>
                                            <td style="padding:10px;border-right: 1px solid #000;border-bottom: 1px solid #000;"><strong>£{{$amount_details['total_amount']}}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>

                        {{-- <tr>
                            <td style="padding: 0;">
                                <table width="100%" cellpadding="0" cellspacing="0"
                                    style="background:#fff; font-family: 'Poppins', sans-serif; border:1px solid #000;">
                                    <tr>
                                        <td style="padding:10px;font-size: 14px;">If this invoice is for ongoing
                                            services and you have requested us to take payment using the continuous
                                            authority credit or debit card details stored on our system, then we will do
                                            so and no further action is required</td>
                                    </tr>
                                </table>
                            </td>
                        </tr> --}}
                        {{-- <tr>
                            <td style="height:80px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="padding:5px;text-align:center;font-size:16px; color: #646464;">1st Formations
                                Limited, Company Number: 08861249, Vat Number: 185 8695 41</td>
                        </tr>
                        <tr>
                            <td style="padding:0;text-align:center;font-size:12px;color: #646464;"><strong><i>71-75,
                                        Shelton Street, Covent Garden, London, WC2H 9JQ, UNITED KINGDOM</i></strong>
                            </td>
                        </tr> --}}
                    </table>
                </td>
            </tr>
            <tr>
                <td style="height:20px;" colspan="2">&nbsp;</td>
            </tr>
        </tbody>
        {{-- <tr>
            <td style="padding: 0; text-align: center;" colspan="3">
                <table width="100%" cellpadding="0" cellspacing="0" style="background:#fff; font-family: 'Poppins', sans-serif;">
                    <tr>
                        <td style="padding:15px;"><p style="text-align: center; font-size: 14px;line-height: 1.2;color: #000;font-weight: 500;padding: 0 0 0px;margin: 0;">Copyright © 2023 Formationshunt. | All Rights Reserved.</p></td>
                    </tr>
                </table>
            </td>
        </tr> --}}
    </table>
    <!--/100% body table-->
</body>

</html>
