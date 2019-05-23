<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet" type="text/css"/>
    <script type="javascript" src="{{asset('js/main.js')}}"></script>
</head>
<body>
<div class="page">
    <div class="page-main">
        @include('layouts.header')
        <div class="container">
            @yield('content')
        </div>
    </div>
</div>
<script>
    function filter(id)
    {
        window.location.href = '{{ URL::action('FeedbackController@index') }}' +'/' + '?sort=desc&sort_by='+ id;
    }
</script>
</body>
</html>
