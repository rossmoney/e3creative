<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Birthday Price Application</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <script type="text/javascript" src="./js/app.js"></script>
    </head>
    <body>
        <div id="app">
            <div class="container">
                <p>Please enter your day and month of birth, to check the price of GBP on your last birthday.</p>
                <div v-show="message != '' && message != 'Price list refreshed!'" v-cloak class="alert alert-danger" role="alert">
                    @{{ message }}
                </div>
                <div v-show="message != '' && message == 'Price list refreshed!'" v-cloak class="alert alert-success" role="alert">
                    @{{ message }}
                </div>
                <price-add :refresh.sync="globalRefresh" :message.sync="message"></price-add>
                <price-list :refresh.sync="globalRefresh" :message.sync="message"></price-list>
            </div>
        </div>
    </body>
</html>
