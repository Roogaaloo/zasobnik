<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Přihlášení</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700,800,900&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&amp;subset=latin-ext" rel="stylesheet">


    <link media="all" type="text/css" rel="stylesheet" href="/css/admin.css">

</head>
<body id="admin">

@if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif


        @yield('content')


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function(){
            if($(window).height() > $('body').height()+300){
                $('footer').css('position','absolute');
                $('footer').css('width','100%');
                $('footer').css('bottom','0px');
            }

            if($('.alert').length !== 0){
                if($('.alert').html().length > 0){

                    $('.alert').animate({top: '0px', opacity: '0.95'}, 600, 'swing').delay(2000).animate({top: '-50px'},300, 'swing');
                }
            }
        });
    </script>

</body>
</html>
