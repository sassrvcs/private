
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Download Review</title>
</head>
<body>
<!-- partial:index.partial.html -->
<!doctype html>
<html lang="en-US">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Download Review</title>
    <meta name="description" content="Download Review.">
    <style type="text/css">
        a:hover {text-decoration: underline !important;}
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

                            <img src="{{ storage_path('app/public/logo.png') }}" title="logo" alt="logo" style="width:300px;height:50px">
                          </a>
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
                                        <h2 style="color:#000; font-weight:700; margin:0;font-size:29px;font-family: 'Poppins', sans-serif; margin-bottom: 20px;">Particulars</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0;">
                                        <table width="100%" cellpadding="0" cellspacing="0" style="background:#fff; font-family: 'Poppins', sans-serif; border:1px solid #000;">
                                            <tr>
                                                <td style="padding:10px; border-right: 1px solid #000; border-bottom: 1px solid #000;width: 50%;">Company Name</td>
                                                <td style="padding:10px; border-bottom: 1px solid #000;width: 50%;">{{$review->companie_name}}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:10px; border-right: 1px solid #000; border-bottom: 1px solid #000;width: 50%;">Company Type</td>
                                                <td style="padding:10px; border-bottom: 1px solid #000;width: 50%;">{{$review->companie_type}}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:10px; border-right: 1px solid #000; border-bottom: 1px solid #000;width: 50%;">Jurisdiction</td>
                                                <td style="padding:10px;border-bottom: 1px solid #000;width: 50%;">{{$review->jurisdiction->name}}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:10px; border-right: 1px solid #000;width: 50%;">SIC Codes</td>
                                                <td style="padding:10px;width: 50%;">@if ($review->sicCodes->count() > 0)
                                                    {{ implode(', ', $review->sicCodes->pluck('name')->toArray()) }}
                                                @else
                                                    {{-- No data present --}}
                                                @endif</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:30px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding:0">
                                        <h2 style="color:#000; font-weight:700; margin:0;font-size:29px;font-family: 'Poppins', sans-serif; margin-bottom: 20px;">Registered Office</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0;">
                                        <table width="100%" cellpadding="0" cellspacing="0" style="background:#fff; font-family: 'Poppins', sans-serif; border:1px solid #000;">
                                            <tr>
                                                <td style="padding:10px; border-right: 1px solid #000;width: 50%;">Address</td>
                                                <td style="padding:10px;width: 50%;">42 Danes Court, North End Road, Greater London,Wembley, United Kingdom (UK), ha90ae</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:30px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding:0">
                                        <h2 style="color:#000; font-weight:700; margin:0;font-size:29px;font-family: 'Poppins', sans-serif; margin-bottom: 20px;">Appointments</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0;">
                                        <table width="100%" cellpadding="0" cellspacing="0" style="background:#fff; font-family: 'Poppins', sans-serif; border:1px solid #000;">
                                            <tr>
                                                <td style="padding:10px; border-right: 1px solid #000; border-bottom: 1px solid #000;width: 50%;">Name</td>
                                                <td style="padding:10px; border-bottom: 1px solid #000;width: 50%;">Shreya Das</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:10px; border-right: 1px solid #000; border-bottom: 1px solid #000;width: 50%;">Roles</td>
                                                <td style="padding:10px; border-bottom: 1px solid #000;width: 50%;">Director,Shareholder,Secretary,PSC,ConsentYes</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:10px; border-right: 1px solid #000; border-bottom: 1px solid #000;width: 50%;">Holdings</td>
                                                <td style="padding:10px;border-bottom: 1px solid #000;width: 50%;">1x ORDINARY @1.00GBP</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:10px; border-right: 1px solid #000; border-bottom: 1px solid #000;width: 50%;">DOB</td>
                                                <td style="padding:10px;border-bottom: 1px solid #000;width: 50%;">18/06/1975</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:10px; border-right: 1px solid #000; border-bottom: 1px solid #000;width: 50%;">Occupation</td>
                                                <td style="padding:10px;border-bottom: 1px solid #000;width: 50%;">Service</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:10px; border-right: 1px solid #000; border-bottom: 1px solid #000;width: 50%;">Nationality</td>
                                                <td style="padding:10px;border-bottom: 1px solid #000;width: 50%;">Indian</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:10px; border-right: 1px solid #000; border-bottom: 1px solid #000;width: 50%;">Residential Address</td>
                                                <td style="padding:10px;border-bottom: 1px solid #000;width: 50%;">36 Danes Court, North End Road, Wembley, United Kingdom (UK), ha90ae</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:10px; border-right: 1px solid #000;width: 50%;">Nature Of Control</td>
                                                <td style="padding:10px;width: 50%;">
                                                    <p style="padding:0;margin: 0;">More than 25% but not more than 50%</p>
                                                    <p style="padding:0;margin: 0;">More than 25% but not more than 50%</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:30px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding:0">
                                        <h2 style="color:#000; font-weight:700; margin:0;font-size:29px;font-family: 'Poppins', sans-serif; margin-bottom: 20px;">Documents</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0;">
                                        <table width="100%" cellpadding="0" cellspacing="0" style="background:#fff; font-family: 'Poppins', sans-serif; border:1px solid #000;">
                                            <tr>
                                                <td style="padding:10px; border-right: 1px solid #000;width: 50%;">Memorandum and Articles:</td>
                                                <td style="padding:10px;width: 50%;">{{ ($review->legal_document == 'generic_article') ? 'Generic Limited by Share Articles' : 'Byspoke article of association' }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:30px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding:0">
                                        <h2 style="color:#000; font-weight:700; margin:0;font-size:29px;font-family: 'Poppins', sans-serif; margin-bottom: 20px;">Business Account</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0;">
                                        <table width="100%" cellpadding="0" cellspacing="0" style="background:#fff; font-family: 'Poppins', sans-serif; border:1px solid #000;">
                                            <tr>
                                                <td style="padding:10px; border-right: 1px solid #000;width: 50%;">Business Account</td>
                                                <td style="padding:10px;width: 50%;">{{ $review->businessBanking->businessBanking->title ?? 'No Merchant Account Selected' }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:30px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding:0">
                                        <h2 style="color:#000; font-weight:700; margin:0;font-size:29px;font-family: 'Poppins', sans-serif; margin-bottom: 20px;">Merchant Account</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0;">
                                        <table width="100%" cellpadding="0" cellspacing="0" style="background:#fff; font-family: 'Poppins', sans-serif; border:1px solid #000;">
                                            <tr>
                                                <td style="padding:10px; border-right: 1px solid #000;width: 50%;">Merchant Account</td>
                                                <td style="padding:10px;width: 50%;">No Merchant Account selected</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="height:30px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding:0">
                                        <h2 style="color:#000; font-weight:700; margin:0;font-size:29px;font-family: 'Poppins', sans-serif; margin-bottom: 20px;">Accounting Software</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0;">
                                        <table width="100%" cellpadding="0" cellspacing="0" style="background:#fff; font-family: 'Poppins', sans-serif; border:1px solid #000;">
                                            <tr>
                                                <td style="padding:10px; border-right: 1px solid #000;width: 50%;">Accounting Software </td>
                                                <td style="padding:10px;width: 50%;">{{ $review->businessBanking->accountingSoftware->accounting_software_name ?? 'No Accounting Software Product Selected' }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="height:30px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding:0">
                                        <h2 style="color:#000; font-weight:700; margin:0;font-size:29px;font-family: 'Poppins', sans-serif; margin-bottom: 20px;">Insurance</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0;">
                                        <table width="100%" cellpadding="0" cellspacing="0" style="background:#fff; font-family: 'Poppins', sans-serif; border:1px solid #000;">
                                            <tr>
                                                <td style="padding:10px; border-right: 1px solid #000;width: 50%;">Insurance</td>
                                                <td style="padding:10px;width: 50%;">No Insurance Product selectedts</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="height:30px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding:0">
                                        <h2 style="color:#000; font-weight:700; margin:0;font-size:29px;font-family: 'Poppins', sans-serif; margin-bottom: 20px;">Finance</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0;">
                                        <table width="100%" cellpadding="0" cellspacing="0" style="background:#fff; font-family: 'Poppins', sans-serif; border:1px solid #000;">
                                            <tr>
                                                <td style="padding:10px; border-right: 1px solid #000;width: 50%;">Finance</td>
                                                <td style="padding:10px;width: 50%;">No Finance Product selected</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="height:30px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding:0">
                                        <h2 style="color:#000; font-weight:700; margin:0;font-size:29px;font-family: 'Poppins', sans-serif; margin-bottom: 20px;">Memberships</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0;">
                                        <table width="100%" cellpadding="0" cellspacing="0" style="background:#fff; font-family: 'Poppins', sans-serif; border:1px solid #000;">
                                            <tr>
                                                <td style="padding:10px; border-right: 1px solid #000;width: 50%;">Memberships</td>
                                                <td style="padding:10px;width: 50%;">No Membership Product selected</td>
                                            </tr>
                                        </table>
                                    </td>
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
</body>
</html>
