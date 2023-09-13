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
                        <table cellspacing="0" border="0" cellpadding="0" width="100%" style="background:#fff; font-family: 'Poppins', sans-serif; padding: 100px 0px;">
                            <tr>
                                <td style="text-align: center;">
                                    <p style="font-size: 28px; padding: 0 0 60px; margin: 0;">The Companies Act 2006</p>
                                    <h2 style="font-size: 36px; padding: 0 0 20px; margin: 0;font-weight: 400;">{{$company_name}}</h2>
                                    <p style="font-size: 24px; padding: 0 0 80px; margin: 0;">Limited By Shares </p>
                                    <h1 style="font-size: 46px; padding: 0 0 80px; margin: 0 auto;max-width: 640px;font-weight: 400;">MEMORANDUM AND ARTICLES OF ASSOCIATION</h1>
                                    <h3 style="font-size: 28px; padding: 0 0 0px; margin: 0; font-weight: 400;">Company Number: {{$company_number}} </h3>
                                    <h3 style="font-size: 28px; padding: 0 0 0px; margin: 0; font-weight: 400;">Incorporated on : {{$date}} </h3>
                                </td>
                            </tr>
                        </table>
                    </tr>
                    <tr>
                        <td>
                            <table cellspacing="0" border="0" cellpadding="0" width="100%" style="background:#fff; font-family: 'Poppins', sans-serif;">
                                <tr>
                                    <td style="text-align: center;">
                                        <h2 style="font-size: 51px; font-weight: 500; padding: 0 0 30px;margin: 0;">COMPANY HAVING A SHARE CAPITAL</h2>
                                        <h2 style="font-size: 51px; font-weight: 600; line-height: 1.4; padding: 0 0 30px;margin: 0 auto; max-width: 761px;">Memorandum of Association of {{$company_name}}</h2>
                                        <p style="font-size: 25px; text-align: left; line-height: 1.6;">Each subscriber to this memorandum of association wishes to form a company under the Companies Act 2006 and agrees to become a
                                            member of the company and to take at least one share.</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table cellspacing="0" border="0" cellpadding="0" width="100%" style="background:#fff; font-family: 'Poppins', sans-serif;">
                                <tr>
                                    <td style="font-size: 20px; border-top: 2px solid #000; border-bottom: 2px solid #000;padding:15px 0px;"><strong>Name of each subscriber</strong></td>
                                    <td style="font-size: 20px; border-top: 2px solid #000; border-bottom: 2px solid #000;padding:15px 0px;"><strong>Authentication</strong></td>
                                </tr>
                                @foreach ($shareholders_names as $name)

                                <tr>

                                    <td style="font-size: 20px; padding:15px 0px; border-bottom: 2px solid">{{$name}}</td>
                                    <td style="font-size: 20px; padding:15px 0px; border-bottom: 2px solid">Authenticated Electronically</td>

                                </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 20px; padding:40px 0px;">Dated: {{$date}}</td>
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
