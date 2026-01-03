<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contoh penggunaan blade pada php</title>
</head>
<body><p>{{$activity->name}} </p>
   @foreach ($students as $students)
<p> {{$students->name}}</p>
@endforeach
</body>
</html>