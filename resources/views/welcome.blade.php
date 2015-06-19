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

            .center {
                text-align: center;
            }

            p {
                text-align: left;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">{{{ $isIndex? $title: $message }}}</div>
                {!!Form::open(array('url' => 'save', 'files' => true ))!!}
                <p>
                    {!!Form::label('screen', '스크린')!!} : 
                    {!!Form::file('screen')!!}
                    (218x123에 최적화)
                </p>

                <p>
                    {!!Form::label('motto', '소원')!!} : 
                    {!!Form::textarea('motto', $title, array('maxlength' => 12, 'rows' => 2))!!} 
                </p>
                
                <p>
                    {!!Form::submit('간절하게 바라기')!!}
                </p>
                {!!Form::close()!!}
            </div>
        </div>
    </body>
</html>