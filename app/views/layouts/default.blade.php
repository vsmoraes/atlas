<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="">

        <title>vsmoraes : Atlas Personal Finance</title>

        @include('layouts.partials.css')

    </head>

    <body>

        <div class="container">

            @include('layouts.partials.navbar')

            <div class="container-fluid">
                <div class="row">
                    @include('layouts.partials.sidebar')

                    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                        @yield('content')
                    </div>
                </div>
            </div>
            
        </div>

        @include('layouts.partials.js')
    </body>
</html>
