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

    <link media="all" type="text/css" rel="stylesheet" href="/css/open-sans.css">
    <link media="all" type="text/css" rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link media="all" type="text/css" rel="stylesheet" href="/css/admin.css?v=<?php echo date('YMDHis'); ?>">

    <style>
        main{
            padding-top: 0;
        }
        footer>.container{
            border-top: 1px solid #f1f1f1;
            margin:0;
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

<script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.js"></script>

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