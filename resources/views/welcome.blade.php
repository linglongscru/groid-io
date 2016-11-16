<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Groid</title>

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' rel='stylesheet' type='text/css'>

    <style>
        body, html {
            background: url('/img/Groid-logo-3.png') top left;
            background-repeat: no-repeat;
            background-size: contain;
            height: 100%;
            margin: 0;
            min-height: 400px;
        }

        .full-height {
            min-height: 100%;
        }

        .flex-column {
            display: flex;
            flex-direction: column;
        }

        .flex-fill {
            flex: 1;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }


        .text-center {
            text-align: center;
        }

        .links {
            padding: 1em;
            text-align: right;
        }

        .links a {
            text-decoration: none;
        }

        .links button {
            background-color: #0794fa;
            border: 1px solid #808080;
            border-radius: 4px;
            color: white;
            cursor: pointer;
            font-family: 'Source Sans Pro';
            font-size: 16px;
            font-weight: 300;
            padding: 15px;
            text-transform: uppercase;
            width: 100px;
        }
    </style>
</head>
<body>
    <div class="full-height flex-column">
        <nav class="links">
            <a href="/login" style="margin-right: 15px;">
                <button>
                    Login
                </button>
            </a>

            <a href="/register">
                <button>
                    Register
                </button>
            </a>
        </nav>

        <div class="flex-fill flex-center">
            <h1 class="text-center">
            </h1>
        </div>
    </div>
</body>
</html>
