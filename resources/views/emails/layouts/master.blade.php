<html>
<head>
    <style>
        body {
            background-color: #f5f5f5;
            background-image: url({{ asset('image/background.png') }});
        }

        main {
            width: 600px;
            margin: 20 auto;
            padding: 15px;
            background-color: #f5f5f5;
            border: 2px solid #3C2EF1;
            border-radius: 10px;
            box-shadow: 2px 2px #000;
            text-align: center;
        }
        main img {
            height: 100px;
            width: 100px;
        }
        main article {
            font-size: 1.3em;
            text-align: left;
        }

        .logo {
            margin-top: 0;
            font-family: Mangal;
            font-size: 1.5em;
            font-weight: bold;
        }

        .red {color: #EA1818;}
        .blue {color: #3C2EF1;}

        footer {
            width: 100%;
            text-align: center;
        }

        .copyrights {
            margin-top: 20px;
            padding: 5px;
            font-size: 16px;
            font-family: tahoma;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            color: #3C2EF1;
            background-color: #f5f5f5;
            border: 2px solid #EA1818;
            border-radius: 20px;
            box-shadow: 2px 2px #000;
            cursor: pointer;
        }
        .copyrights:hover {
            color: #EA1818;
            border-color: #3C2EF1;
        }
    </style>
</head>
<body>    
    <main>
        <img src="{{ asset('image/logo.png') }}" alt="Logo">

        <h1 class="logo">
            <span class="red">LINEAR</span><span class="blue">CHAT</span>
        </h1>

        <article>
            @section('content')
            @show
        </article>
    </main>

    <footer >
        <a href="" class="copyrights">&copy; LinearChat {{ date('Y') }}</a>
    </footer>
</body>
</html>