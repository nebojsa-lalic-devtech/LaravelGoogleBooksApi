<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous">
    </script>

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
</br>
<div>
    <form method="get" id="testForm">
            <input name="isbn" id="isbn" placeholder="Search books by ISBN...">
            <input id="search_button" type="submit" name="Submit" value="Book Search"/>
            {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
    </form>
</div>

<h3 id="google_api_info"></h3>

<h3>
    <u><p>Book info:</p></u>
    <img id="thumbnail">
        <div id="google_isbn"></div></br>
        <div id="google_title"></div></br>
        <div id="google_author"></div></br>
        <div id="no_items"></div>
</h3>
<h6>---------------------------------------------------------------------</h6>
<h3>
    <u><p>Devtech Library status:</p></u>
    <div id="book_status"></div>
</h3>

<script type="text/javascript" src="{{ URL::asset('js/ajaxPostRequest.js') }}"></script>

</body>
</html>
