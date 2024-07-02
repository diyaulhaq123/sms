<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome Staff</title>
    <style>

        #container{
            width: 100%;
            padding: 20px;
            justify-content: center;
        }
        #row{
            display:inline-block;
            justify-content: center;
            padding: 20px;
        }
        #button1{
            padding: 7px;
            border: 1px solid #1C9F75;
            border-radius: 5px;
            text:center;
            background: #1C9F75;
        }
    </style>
</head>
<body>
    <div id="container">
        <div class="row" id="row">
            <h3>Hello there,</h3>
            <div>Welcome to Islamic Internatinal School</div>
            <hr>
            <div class="">Dear {{ $user }}, Your registration was successful</div>
            <br>
            <button class="" id="button1">Click here to login!</button>
            <hr>
        </div>
    </div>
</body>
</html>
