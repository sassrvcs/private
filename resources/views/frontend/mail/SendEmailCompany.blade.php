<table  width="100%" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse;line-height:24px;width:100%;font-size:14px;color:#1c1c1e;background-color:#fff;margin:0;padding:0" bgcolor="#E8EBED">
    <tbody>
        <tr>
            <td valign="top" style="font-family:Arial;border-collapse:collapse">
                <table cellpadding="0" cellspacing="0" border="0" align="center" style="border-collapse:collapse;background-color:#ffffff;border-radius:4px;margin-top:20px;margin-bottom:20px;    border: 1px solid #001B69;" bgcolor="#fff">
                    <thead style="background-color: #313C4E;">
                        <tr style="text-align: left;">
                            <th style="padding: 50px;">
                                <img src="{{$message->embed($logo)}}" alt="">
                            </th>
                        </tr>
                    </thead>
                    <tbody>


                        <tr>
                            <td width="600" valign="top" style="font-family:Arial;border-collapse:collapse">
                                <div style="max-width:600px;margin:0 auto;padding-left:40px;padding-bottom:40px;padding-right:40px">
                                    <h1 style="font-size:16px;line-height:1.5;margin:0">Hello {{$name}},</h1>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td width="600" valign="top" style="font-family:Arial;border-collapse:collapse">
                                <div style="max-width:600px;margin:0 auto;padding-left:40px;padding-bottom:40px;padding-right:40px">
                                    <p style="font-size:16px;line-height:1.5;margin:0">{!! $body !!} </p>

                                </div>
                            </td>
                        </tr>


                        <tr>
                            <td width="600" valign="top" style="font-family:Arial;border-collapse:collapse">
                                <div style="max-width:600px;margin:0 auto;padding-left:40px;padding-bottom:40px;padding-right:40px;padding-top: 20px;">
                                    <div style="font-size: 16px;">Regards!!!</div>
                                    <div style="font-size: 16px;margin-top: 8px;">Formations Hunt</div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td style="border-bottom: 5px solid #313C4E;"></td>
                        </tr>
                    </tfoot>
                </table>

            </td>

        </tr>
    </tbody>
</table>
