<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BuildDates</title>
    <link rel="stylesheet" href={{ asset('css/app.css') }}>
</head>
<body>
<div class="container">
    <div class="alert alert-success mt-5" role="alert">
        This is build date of warehouse customs (({{Carbon\Carbon::now()}}}))
    </div>
</div>

<table class="table table-bordered table-striped text-center">
    <thead>
    <tr>
        <th>gomrok name</th>
        <th>build date</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $d)
        <tr>
            <td>{{$d['name']}}</td>
            <td>{{$d['buildDate']}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
