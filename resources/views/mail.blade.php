<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Hello {{$name}}
    <a href="{{url('verify/'.$hash.'/'.$id)}}">click here</a>
</body>
</html>