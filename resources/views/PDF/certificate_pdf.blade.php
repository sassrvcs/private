<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Email Template</title>
</head>
<body>
<!-- partial:index.partial.html -->
<!doctype html>
<html lang="en-US">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Reset Password Email Template</title>
    <meta name="description" content="Reset Password Email Template.">
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
                        <table cellspacing="0" border="0" cellpadding="0" width="100%" style="background:#fff; border-bottom: 2px dashed #000; font-family: 'Poppins', sans-serif; padding: 0 0 10px;">
                            <tr>
                                <td style="padding:5px 10px;">Company Number: {{$company_number}}</td>
                                <td style="padding:5px 10px; text-align: center;">Date: {{$date}}</td>
                                <td style="padding:5px 10px; text-align: right;">Certificate #1</td>
                            </tr>
                            <tr>
                                <td style="padding:5px 10px;">Shareholder: {{$shareholders_names}}</td>
                                <td style="padding:5px 10px;"></td>
                                <td style="padding:5px 10px; text-align: right;">Number of Shares:{{$number_of_shares}}</td>
                            </tr>
                        </table>
                    </tr>
                    <tr>
                        <td style="padding-top: 30px;">
                            <div style="border: 2px solid #2e477c; padding: 2px;">
                                <div style="border: 4px solid #2e477c; padding: 2px;">
                                    <div style="border: 2px solid #2e477c; padding: 2px;">
                                        <table cellspacing="0" border="0" cellpadding="0" width="100%" style="text-align: center; background:#fff; font-family: 'Poppins', sans-serif;">
                                            <tr>
                                                <td colspan="3" style="padding:20px 10px 8px;"><strong>{{$company_name}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="padding:10px 10px;">{{$company_office_address}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="padding:10px 10px;">Registered in {{$registered_in}}, Number {{$company_number}}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:10px 10px; width: 33.333333%;">
                                                    <strong style="display: block;">Certificate No</strong>
                                                    <span>1</span>
                                                </td>
                                                <td style="padding:10px 10px; width: 33.333333%;">
                                                    <strong style="display: block;">Share Class</strong>
                                                    <span>ORDINARY</span>
                                                </td>
                                                <td style="padding:10px 10px; width: 33.333333%;">
                                                    <strong style="display: block;">Quantity</strong>
                                                    <span>{{$number_of_shares}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="padding:10px 10px;">This is to certify that</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="padding:10px 10px;"><strong>{{$director_names}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="padding:10px 10px;">of</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="padding:10px 10px;">{{$company_office_address}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="padding:10px 10px 30px;"> is the registered holder of 100 ORDINARY shares of GBP1 each in the above-named Company, subject to the Memorandum and Articles of Association of the said Company. This certificate is executed by the Company in accordance with the Companies Act 2006.</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
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
