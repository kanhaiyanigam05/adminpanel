<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enquiry Mail</title>
</head>

<body>
    <table style="width: 100%;">
        <tbody>
            <tr>
                <td>
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"
                        style="max-width:700px;background:#e9e9e9; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);padding:10px 20px">
                        <tbody>
                            <tr>
                                <td style="text-align:center;"><img width="250" src="{{ asset($data->logo_dark) }}"
                                        title="logo" style="margin-top: 26px;" alt="logo"></td>
                            </tr>
                            <tr>
                                <td style="height:20px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="padding:0 35px;">
                                    <div class="color-container"
                                        style="background:#906c63;text-decoration: none !important;font-weight: 600;margin-top: 35px;padding: 30px 26px;display: inline-block;border-radius: 14px;">
                                        <h5 style="font-size:22px; margin: 0px;color: #fff;">
                                            Welcome to</h5>
                                        <h2 style="font-size:32px; margin: 15px 0px 0px; color: #fff; width:400px;"
                                            class="compnay_name">
                                            {{ $data->site_name }}</h2>
                                    </div>
                                    <h1
                                        style="color:#000; font-weight:700; margin:0;font-size:34px;font-family:'Rubik',sans-serif;margin-top:30px;">
                                        Dear {{ $admin }},</h1>
                                    <p style="color:#000; font-size:18px;line-height:30px;margin:0; margin-top:30px;font-weight:500;"
                                        class="content"></p>
                                    <p
                                        style="color:#000; font-size:18px;line-height:30px;margin:0px 28px; margin-top:20px;font-weight:500;text-align:left;">
                                        User Details:</p>
                                    <div style="text-align: left;width: 90%;margin: 0px auto;margin-top:10px;">
                                        <p
                                            style="width:40%;display:inline-block;margin:0;font-weight:600;font-size:18px;    text-align: left;">
                                            Name:</p> <span>{{ $request['name'] }}</span>
                                    </div>

                                    <div style=" text-align: left;width: 90%;margin: 0px auto;margin-top:5px;">
                                        <p
                                            style="width:40%;display:inline-block;margin:0;font-weight:600;font-size:18px;    text-align: left;">
                                            Email: </p> <span>{{ $request['email'] }}</span>
                                    </div>
                                    <div style=" text-align: left;width: 90%;margin: 0px auto;margin-top:5px;">
                                        <p
                                            style="width:40%;display:inline-block;margin:0;font-weight:600;font-size:18px;    text-align: left;">
                                            Phone: </p> <span>{{ $request['phone'] }}</span>
                                    </div>
                                    <div style=" text-align: left;width: 90%;margin: 0px auto;margin-top:5px;">
                                        <p
                                            style="width:40%;display:inline-block;margin:0;font-weight:600;font-size:18px;    text-align: left;">
                                            Comapny Name: </p> <span>{{ $request['company'] }}</span>
                                    </div>
                                    <div style=" text-align: left;width: 90%;margin: 0px auto;margin-top:5px;">
                                        <p
                                            style="width:40%;display:inline-block;margin:0;font-weight:600;font-size:18px;    text-align: left;">
                                            Message: </p> <span>{{ $request['message'] }}</span>
                                    </div>

                                    <a target="_blank" href="{{ url('/') }}" class="button_name"
                                        style=" width:200px; background: #5f453e;text-decoration: none !important;font-weight: 600;margin-top: 32px;color:
                                                     #fff;text-transform: capitalize;font-size: 19px;padding: 14px 30px;display: inline-block;border-radius: 5px;">
                                        Get Started</a>

                                    <p
                                        style="border-bottom: 2px grey solid;padding-bottom: 30px;font-size:20px;line-height: 32px;width: 80%;margin: 30px auto;">
                                        For more information, Contact Us : <br>
                                        <a href="tel:{{ $data->phone1 }}" class="number"
                                            style="font-size: 18px;text-decoration: none;">{{ $data->phone1 }}</a>&nbsp;
                                        <span style="font-size: 18px;">OR
                                        </span> &nbsp;<a href="mailto:{{ $data->email }}"
                                            style="font-size: 18px;text-decoration: none;"
                                            class="email">{{ $data->email }}</a>
                                    </p>
                                </td>
                            </tr>

                            <tr>
                                <td style="padding:0 35px;">
                                    <p style="font-size:20px;line-height: 32px;margin: 0px;text-align: center;">
                                        {{ $data->address }}</p>
                                    <p
                                        style="font-size:20px;line-height: 32px;margin: 0px;text-align: center; margin-top: 10px;">
                                        <span style="border-right: 1px grey solid;padding-right: 6px;font-size: 18px;"
                                            class="website_name">{{ $data->site_name }}</span>
                                        <span style="font-size: 18px;">Copyright © <span
                                                class="year">2024</span></span>
                                    </p>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>


    </table>
</body>

</html>
