<!DOCTYPE html>
<html>
    <head>
        <title>{{ $title }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <meta name="twitter:card" content="summary">
        <meta name="twitter:title" content="{{ $title }}">
        <meta name="twitter:image" content="{{ URL::asset('original.jpg') }}">

        <!-- Open Graph data -->
        <meta property="og:title" content="{{ $title }}" />
        <meta property="og:type" content="article" />
        <meta property="og:image" content="{{ URL::asset('original.jpg') }}" />
        <meta property="og:site_name" content="{{ $title }}" />

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">{{ $isIndex? $title: $message }}</div>
                {!!Form::open(array('url' => 'save', 'files' => true ))!!}
                {!!Form::file('screen')!!}
                {!!Form::text('motto')!!}
                {!!Form::submit('간절하게 바라기')!!}
                {!!Form::close()!!}
            </div>
        </div>
    </body>
</html>
