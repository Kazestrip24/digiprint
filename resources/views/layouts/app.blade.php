<!-- resources/views/layouts/app.blade.php -->


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Default Title')</title>
        <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap4/bootstrap.min.css')}}">
        <link href="{{ url('plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{ url('plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ url('plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ url('plugins/OwlCarousel2-2.2.1/animate.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ url('plugins/slick-1.8.0/slick.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/main_styles.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/responsive.css')}}">
    </head>