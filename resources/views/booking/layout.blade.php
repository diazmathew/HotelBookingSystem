<!DOCTYPE html>
<html>
<head>

    <title>Hotel Booking System</title>

    <style>

    body{
        font-family:Arial;
        background:#f4f4f4;
        margin:0;
    }

    nav{
        background:#8B0000;
        color:white;
        padding:15px;
        font-size:22px;
        text-align:center;
    }

    .container{
        width:70%;
        margin:auto;
        margin-top:40px;
        background:white;
        padding:30px;
        border-radius:10px;
        box-shadow:0 0 10px gray;
    }

    input,select,textarea{
        width:100%;
        padding:10px;
        margin-top:5px;
        margin-bottom:15px;
    }

    button{
        background:#8B0000;
        color:white;
        border:none;
        padding:12px 20px;
        cursor:pointer;
    }

    button:hover{
        background:#660000;
    }

    a{
        text-decoration:none;
        color:white;
    }

    </style>

</head>

<body>

<nav>

Hotel Booking System

</nav>

<div class="container">

@yield('content')

</div>

</body>
</html>