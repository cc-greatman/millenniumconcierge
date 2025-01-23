<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title>Hotel Trips Report</title>

    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" type="text/css">
    <!-- Web Font / @font-face : BEGIN -->
    <!--[if mso]>
        <style>
            * {
                font-family: 'Roboto', sans-serif !important;
            }
        </style>
    <![endif]-->

    <!--[if !mso]>
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,600" rel="stylesheet" type="text/css">
    <![endif]-->

    <!-- Web Font / @font-face : END -->

    <!-- CSS Reset : BEGIN -->


    <style>
        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
            font-family: 'Raleway', sans-serif !important;
            font-size: 14px;
            margin-bottom: 10px;
            line-height: 24px;
            color: #8094ae;
            font-weight: 400;
        }
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            margin: 0;
            padding: 0;
        }
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }
        table table table {
            table-layout: auto;
        }
        a {
            text-decoration: none;
        }
        img {
            -ms-interpolation-mode:bicubic;
        }
    </style>

</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #101010;">
	<center style="width: 100%; background-color: #101010;">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#101010" >
            <tr>
               <td style="padding: 40px 0; border-radius: 150px;">
                    <table style="width:100%;max-width:620px;margin:0 auto; border:1px solid;border-color: #DFBF81; background-color:#282828;">
                        <tbody>
                            <tr>
                                <td style="text-align: center; padding-bottom:25px; padding-top: 15px;">
                                    <a href="#"><img style="height: 40px" src="https://millenniumconcierge.com/frontend/img/logo-light.png" alt="logo"></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="width:100%;max-width:620px;margin:0 auto;background-color:#282828;">
                        <tbody>
                            <tr>
                                <td style="padding: 30px 30px 15px 30px;">
                                    <h2 style="font-size: 18px; color: #DFBF81; font-weight: 600; margin: 0;">Hotel Trips Report</h2>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0 30px 20px; color:#999 !important;">
                                    <p style="margin-bottom: 10px;">Dear {{ $name }},</p>
                                    <p style="margin-bottom: 10px;">We hope you are enjoying all the benefits being a part of our Millennium Family brings to you. <br><br> Welcome once again to the Millennium Family💃💃! <br><br> You are receiving this email because you have just registered an account with us on our website and it's that time of the month to check how well we worked together.</p>
                                    <p style="margin-bottom: 25px;">This link will expire in 15 minutes and can only be used once.</p>
                                    <p>Please find attached a PDF Report containing your Hotel Trips with us.</p>
                                    <p>Best regards,<br>Millennium Concierge</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 20px 30px 40px; color:#999;">
                                    <p style="margin: 0; font-size: 13px; line-height: 22px; color:#DFBF81;">This is an automatically generated email please do not reply to this email. If you face any issues, please contact us at  help@millenniumconcierge.com</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="width:100%;max-width:620px;margin:0 auto;">
                        <tbody>
                            <tr>
                                <td style="text-align: center; padding:25px 20px 0;">
                                    <p style="font-size: 13px; color:#999;">Copyright © {{ date('Y') }} {{ env("APP_NAME") }}. All rights reserved. <br></p>
                                    <p style="padding-top: 15px; font-size: 12px; color:#999;">This email was sent to you as a registered user of <a style="color: #DFBF81; text-decoration:none;" href="{{ route('home') }}">{{ env("APP_NAME") }}</a>. To update your emails preferences <a style="color: #DFBF81; text-decoration:none;" href="#">click here</a>.</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
               </td>
            </tr>
        </table>
    </center>
</body>
</html>
