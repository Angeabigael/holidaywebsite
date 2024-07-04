<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Backend</title>
    <link href="{{asset('assets/css/google.css')}}" rel="stylesheet" type="text/css" />

<style>
    body {
        background: url('/img/backimg.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        font-family: "Open Sans", sans-serif;
        margin: 0 auto 0 auto;
        width: 100%;
        height: 600px;
        text-align: center;
        margin: 20px 0px 20px 0px;
    }

    p {
        font-size: 12px;
        text-decoration: none;
        color: #ffffff;
    }

    h1 {
        font-size: 1.5em;
        color: #525252;
    }

    .box {
        background: url('/img/fleur.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        width: 340px;
        border-radius: 6px;
        margin: 0 auto 0 auto;
        padding: 0px 0px 70px 0px;
        box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
        position: absolute;
        top: 50%;
        left: 50%;

        transform: translate(-50%, -50%);
    }

    .email {
        background: #ecf0f1;
        border: #ccc 1px solid;
        border-bottom: #ccc 2px solid;
        padding: 8px;
        width: 250px;
        color: #aaaaaa;
        margin-top: 10px;
        font-size: 1em;
        border-radius: 4px;
    }

    .password {
        border-radius: 4px;
        background: #ecf0f1;
        border: #ccc 1px solid;
        padding: 8px;
        width: 250px;
        font-size: 1em;
    }

    .btn-container {
        padding: 1rem;
    }

    button {
        background: #2ecc71;
        width: 125px;
        padding-top: 5px;
        padding-bottom: 5px;
        color: white;
        border-radius: 4px;
        border: #27ae60 1px solid;
        font-weight: 800;
        font-size: 0.8em;
    }

    .btn:hover {
        background: #2cc06b;
    }

    #btn2 {
        float: left;
        background: #3498db;
        width: 125px;
        padding-top: 5px;
        padding-bottom: 5px;
        color: white;
        border-radius: 4px;
        border: #2980b9 1px solid;

        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: 10px;
        font-weight: 800;
        font-size: 0.8em;
    }

    #btn2:hover {
        background: #3594d2;
    }
</style>
</head>
<body>

    <form method="post" action="{{route('adminpost')}}">

        @csrf
        @method('POST')

        <div class="box">
            <h1 style="color: #ffffff">Connexion</h1>
            @error('name')
                <div>
                    <h1 style="text-transform: uppercase; background-color: red;">{{$message}}</h1>
                </div>
            @enderror

            <input type="text" name="name" class="email" placeholder="Username">

            <input type="password" name="password" class="email" placeholder="Password">

            <div class="btn-container">
                <button type="submit"> Login</button>
            </div>

            <!-- End Btn -->
            <!-- End Btn2 -->
        </div>
        <!-- End Box -->
    </form>

</body>
</html>
