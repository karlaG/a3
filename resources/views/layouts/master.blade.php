<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>What's my sign?</title>
    </head>

    <body>
        <h1>My sign is</h1>

        <section>@yield('content')</section>

        <footer>&copy; {{ date('Y') }}</footer>
    </body>
</html>
