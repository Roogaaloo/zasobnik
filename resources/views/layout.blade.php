<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Návrh i realizace webových aplikací.">
    <meta name="keywords" content="web, webové stránky, webovky, Robert Galovič, ">
    <meta name="author" content="Robert Galovič">
    <meta name="robots" content="noindex,nofollow">


    <link rel="icon" type="image/png" href="http://www.svarovskyjiri.cz/img/favicon.ico" sizes="32x32">
    <link rel="icon" type="image/png" href="http://www.svarovskyjiri.cz/img/favicon.ico" sizes="192x192">
    <link rel="icon" type="image/png" href="http://www.svarovskyjiri.cz/img/favicon.ico" sizes="96x96">
    <link rel="icon" type="image/png" href="http://www.svarovskyjiri.cz/img/favicon.ico" sizes="16x16">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('styles')

    <?php require_once "Minifier.php";

    $minifier = new Minifier();

    $minifier->add("css/bootstrap.css");
    $minifier->add("css/raleway.css");
    $minifier->add("css/open-sans.css");

    $minifier->add("slick/slick.css");
    $minifier->add("css/styles.css");

    $minifier->render();

    ?>
    <title>@if(isset($title)) {{ $title }} @else Robert Galovič | Web developer @endif</title>
    @if($_SERVER['REQUEST_URI'] == '/kontakt')
        <style>
            main{
                padding-top: 0;
                padding-bottom: 50px;
            }
        </style>
    @else
        <style>
            footer{
                margin-top: 50px;
            }
        </style>
    @endif

  </head>
<body>
<div class="meeting-slide">
    <i class="fa fa-handshake-o"></i>
    <div class="meeting-slide-title">
        Sjednat<br />schůzku
    </div>
</div>
@if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
        <div class="alert-close"><i class="fa fa-times"></i></div>
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-error">
        {{ Session::get('error') }}
        <div class="alert-close"><i class="fa fa-times"></i></div>
    </div>
    <style>
        input:required[value=""]{
            border-color: #f31e1e;
        }
        textarea:required:empty{
            border-color: #f31e1e;
        }
        input.required[value=""]{
            border-color: #f31e1e;
        }
        textarea.required:empty{
            border-color: #f31e1e;
        }
    </style>
@endif

@if (Session::has('error_meeting'))
    <div class="alert alert-error">
        {{ Session::get('error_meeting') }}
        <div class="alert-close"><i class="fa fa-times"></i></div>
    </div>
    <style>
        input:required[value=""]{
            border-color: #f31e1e;
        }
        textarea:required:empty{
            border-color: #f31e1e;
        }
        input.required[value=""]{
            border-color: #f31e1e;
        }
        textarea.required:empty{
            border-color: #f31e1e;
        }
    </style>
@endif
@include('partitials.modal_form')
<div class="page-loader">
    <div class="loader"><div class="loader-inner ball-clip-rotate-multiple"><div></div><div></div></div></div>
    <div class="loader2"><div class="loader-inner ball-clip-rotate-multiple"><div></div><div></div></div></div>
    <div class="loader3"><div class="loader-inner ball-clip-rotate-multiple"><div></div><div></div></div></div>
</div>
@include('partitials.header')
<main>
    @yield('content')
</main>
@include('partitials.footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
<script type="text/javascript" src="/js/scripts.js"></script>

@if (Session::has('error_meeting'))
    <script type="text/javascript">
        $(document).ready(function(){
            $('.meeting-popup').fadeIn(300);
            $('body').css('overflow-y','hidden');
        });
    </script>
@endif

@yield('scripts')
<script type="text/javascript">
    $(document).ready(function(){

        $('.meeting-popup .option label').toggle(function(){
            $(this).css({background: '#87bc26', color: '#fff'});
            $(this).next('input[type="checkbox"]').prop('checked', true);
        }, function () {
            $(this).attr('style','');
            $(this).next('input[type="checkbox"]').prop('checked', false);
        });

        if($(window).height() > $('body').height()){
            $('footer').css('position','absolute');
            $('footer').css('width','100%');
            $('footer').css('bottom','0px');
        }
        $('.meeting-slide, .btn-meeting').click(function(){
            $('.meeting-popup').fadeIn(300);
            $('body').css('overflow-y','hidden');
        });

        $('.close').click(function(){
            $('.meeting-popup').fadeOut(300);
            $('body').css('overflow-y','auto');
        });
        if($('.alert').length !== 0){
            if($('.alert').html().length > 0){

                $('.alert').animate({top: $('.alert').height()+23, opacity: '0.95'}, 600, 'swing');
            }
        }
        $('.alert-close').click(function(){
            $('.alert').animate({top: '0px'},300, 'swing');
        });
    });

    $(window).one('resize', function(){
        if($(window).width() > 767) {
            var maxHeight = -1;
            $(this).find("#categories .category-card").each(function () {
                if ($(this).height() > maxHeight) {
                    maxHeight = $(this).height();
                }
            });
            $('#categories .category-card').height(maxHeight);
        }
    });

    $(window).resize(function(){
        if($(window).width() > 767) {
            var maxHeight = -1;
            $('#categories .category-card').each(function () {
                if ($(this).height() > maxHeight) {
                    maxHeight = $(this).height();
                }
                $('#categories .category-card').height(maxHeight);
            });
        }
    });


</script>
<script async defer type="text/javascript" src="/js/last-scripts.js"></script>
</body>
</html>