<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div>
    <div>
        <input type="text" name="search" id="search-input" placeholder="search...">
        <button id="search">search</button>
    </div>
    <table class="table table-hover table-sm">
        <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Company</th>
            <th scope="col">Location</th>
            <th scope="col">Description</th>
        </tr>
        </thead>
        <tbody>
        <tbody class="all-data">
        @foreach($jobs as $job)
            <tr>
                <td>{{ $job->title }}</td>
                <td>{{ $job->company }}</td>
                <td>{{ $job->location }}</td>
                <td>{{ $job->description }}</td>
            </tr>
        @endforeach
        </tbody>
        <tbody id="content" class="search-data"></tbody>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('/js/search.js') }}"></script>
</body>
</html>
