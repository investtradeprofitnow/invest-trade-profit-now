<!DOCTYPE html>
<html>
    <head>
        <title>Laravel 8 Send Email Example</title>
        <style>
            .text-center{
                text-align: center;
            }
            .container{
                width: 50% !important;
                background-color: #edfdfd;
                border-radius: 10px;
            }
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container p-3 pt-5">
            <h4>Hello {{$name}},</h4>
            <p>Thank you for registering with us. Please enter the 6 digit OTP below for Email Verification.<p>
            <h1 class="text-center">{{$otp}}</h1>
            <p>If you didn't request this, please ignore this email.</p>
            <p>
                <b>Yours, Invest Trade Profit Now Team</b><br/>
                <a href="mailto:contact@investtradeprofitnow.com?subject=Query">contact@investtradeprofitnow.com</a>
            </p>
        </div>
    </body>
</html> 