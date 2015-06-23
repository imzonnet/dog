<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Natural Gurus - @yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Natural Gurus" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta')

    <!-- CSS Styles  -->
    <link href="{{get_template_directory()}}/css/bootstrap.css" rel="stylesheet">
    <link href="{{get_template_directory()}}/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="{{get_template_directory()}}/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{get_template_directory()}}/css/colors.css" rel="stylesheet">
    <link href="{{asset('assets/bootstrap-tour/css/bootstrap-tour.min.css')}}" rel="stylesheet">
    <link href="{{get_template_directory()}}/css/style.css?v=1.03" rel="stylesheet">

    <!-- Favicon and touch icons  -->
    <link href="{{get_template_directory()}}/ico/apple-touch-icon-144-precomposed.png" rel="apple-touch-icon-precomposed" sizes="144x144">
    <link href="{{get_template_directory()}}/ico/apple-touch-icon-114-precomposed.png" rel="apple-touch-icon-precomposed" sizes="114x114">
    <link href="{{get_template_directory()}}/ico/apple-touch-icon-72-precomposed.png" rel="apple-touch-icon-precomposed" sizes="72x72">
    <link href="{{get_template_directory()}}/ico/apple-touch-icon-57-precomposed.png" rel="apple-touch-icon-precomposed">
    <link href="{{get_template_directory()}}/ico/favicon.png" rel="shortcut icon">
    @section('styles')
    {{-- Here goes the page level styles --}}
    @show
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="{{get_template_directory()}}/js/html5shiv.js"></script>
    <![endif]-->

    @yield('head_scripts')
</head>
<body>