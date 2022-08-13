<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table class="table-auto">
    <thead>
    <tr>
        <th>Title</th>
        <th>Company</th>
        <th>Location</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
    @foreach($jobs as $job)
        <tr>
            <td>{{ $job->title }}</td>
            <td>{{ $job->company }}</td>
            <td>{{ $job->location }}</td>
            <td>{{ $job->description }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
