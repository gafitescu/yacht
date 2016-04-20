<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Yacht.VM</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <nav class="navbar navbar-fixed-top navbar-dark bg-inverse">
        <a class="navbar-brand" href="/">Yacht.vm</a>
        <ul class="nav navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/">Dashboard <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/clients">Clients</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/yacht">Yacht management</a>
            </li>

        </ul>
    </nav>
    @yield('content')

</div> <!-- /container -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
