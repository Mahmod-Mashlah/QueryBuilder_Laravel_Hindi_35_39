<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students 36 </title>
</head>
<body>

        <b>One Row Details :</b>
        <br>
        <br>
        <pre>
        id : {{ $student_first->id }}
        name : {{ $student_first->name }}
        email : <i>{{ $student_first->email }}</i>
        city : {{ $student_first->city }}
        </pre>

        <br>

    <hr>

        <br>
        <b>One column value :</b>
        <br>
        <br>
        <pre>{{ $student_email }} </pre>
        <br>
    <hr>

        <br>
        <b>One Row  [ By Find () Method ]:</b>
        <br>
        <br>
        <pre>
            id : {{ $student_find->id }}
            name : {{ $student_find->name }}
            email : <i>{{ $student_find->email }}</i>
            city : {{ $student_find->city }}
            </pre>
        <br>
    <hr>

</body>
</html>
