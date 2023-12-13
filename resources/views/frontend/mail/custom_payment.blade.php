<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
</head>

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, Helvetica, sans-serif;
    }
</style>

<body style="background-color: #f5f5f5;">
    <table style="width: 95%;
    max-width: 991px;
    margin: 100px auto; background: #fff;">
        <thead style="background-color: #313C4E;">
            <tr style="text-align: left;">
                <th style="padding: 50px;">
                    <img src="{{$message->embed($logo)}}" alt="">
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: left; padding: 50px 10px 10px 50px; font-size: 24px;">Dear {{$name}}</td>
            </tr>

            <tr>
                <th style="text-align: left; padding: 10px 10px 10px 50px; font-size: 28px;">Payment of £{{$amount}} has been Received!(RefID- {{$refId}})</th>
            </tr>
            <tr>
                <td style="text-align: left; padding: 20px 50px; font-size: 18px; line-height: 26px;">
                    Thank you for choosing us!
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td style="border-bottom: 5px solid #313C4E;"></td>
            </tr>
        </tfoot>
    </table>
</body>

</html>
