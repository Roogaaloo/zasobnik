<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Svarovsky">
    <meta name="author" content="Robert">
    <link rel="icon" href="../../favicon.ico">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700,800,900&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&amp;subset=latin-ext" rel="stylesheet">

    <link media="all" type="text/css" rel="stylesheet" href="/css/styles.css">

    <style>
        main{
            padding-top: 0px;
        }
        footer>.container{
            border-top: 1px solid #f1f1f1;
            margin:0px;
            padding-left: 20px;
            padding-right: 20px;
            width: 100%;
        }
    </style>

    <title>Admin</title>
</head>
<body>

@if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-error">
        {{ Session::get('error') }}
    </div>
@endif

<main>
    <div id="admin" class="container-fluid">
        <div class="row header-admin">
            @include('admin.partitials.header')
        </div>
        <div class="row">
            <div class="col-sm-2 admin-menu">
                @include('admin.partitials.menu')
            </div>
            <div class="col-sm-10 admin-content">
                @yield('content')
            </div>
        </div>
    </div>

</main>


@include('admin.partitials.footer')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function(){
        if($(window).height() > $('body').height()+300){
            $('footer').css('position','absolute');
            $('footer').css('width','100%');
            $('footer').css('bottom','0px');
        }

        if($('.alert').length !== 0){
            if($('.alert').html().length > 0){

                $('.alert').animate({top: $('.alert').height()+23, opacity: '0.95'}, 600, 'swing').delay(2000).animate({top: '0px'},300, 'swing');
            }
        }
    });
</script>

</body>
</html>