<!DOCTYPE html>
<html lang="cs">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="{{ $page->meta_description??'Robert Galovič | Web developer' }}">
    <meta name="keywords" content="{{ $page->meta_keywords??'Robert Galovič | Web developer' }}">
    <meta name="author" content="Robert Galovič">
    <meta name="robots" content="noindex,nofollow">
    <title>{{ $page->meta_title??'Robert Galovič | Web developer' }}</title>

    <link rel="icon" type="image/png" href="favicon.ico">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    @yield('styles')
  </head>
<body>

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
@include('partials.modal_form')
<div class="page-loader">
    <div class="loader"><div class="loader-inner ball-clip-rotate-multiple"><div></div><div></div></div></div>
    <div class="loader2"><div class="loader-inner ball-clip-rotate-multiple"><div></div><div></div></div></div>
    <div class="loader3"><div class="loader-inner ball-clip-rotate-multiple"><div></div><div></div></div></div>
</div>
@include('partials.header')
{{ dd(public_path()) }}
<main>
    @yield('content')
</main>

@include('partials.footer')

<script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script type="text/javascript" src="/js/scripts.js"></script>

@if (Session::has('error_meeting'))
    <script type="text/javascript">
        $(document).ready(function(){
            $('.meeting-popup').fadeIn(300);
        });
    </script>
@endif

@yield('scripts')

<script async defer type="text/javascript" src="/js/last-scripts.js"></script>

</body>
</html>