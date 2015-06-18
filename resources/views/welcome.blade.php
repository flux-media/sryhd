<!DOCTYPE html>
<html>
    <head>
        <title>살려야한다</title>

        <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

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
                font-weight: 100;
                font-family: 'Lato';
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

            .quote {
                font-size: 24px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">살려야한다</div>
                {!!Form::open(array('url' => 'save', 'files' => true, 'method' => 'get'))!!}
                {!!Form::file('screen')!!}
                {!!Form::text('quote')!!}
                {!!Form::submit('간절하게 바라기')!!}
                {!!Form::close()!!}
            </div>
        </div>
    </body>
</html>
