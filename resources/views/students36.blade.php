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

    <br>
        <b>One Column  [ By pluck () Method to show only names ]: </b>
        <br>
        <br>
        <pre>
            @foreach ($students_pluck_one_column as $name)

                {{ $name }},

            @endforeach
            </pre>
        <br>
    <hr>

    <br>
        <b>One Column  [ By pluck () Method to show names As key and cities as a values]: </b>
        <br>
        <br>
        <pre>
            @foreach ($students_pluck_tow_columns as $name => $city)

                name : {{ $name }} , city : {{ $city }},

            @endforeach
            </pre>
        <br>
    <hr>

    <br>
        <b>multiple Rows  [ By chunk () Method ]: </b>
        <br>
        <br>
        <pre>
            @php
                $students_chunk = DB::table('students')->orderBy('id')->chunk(3,function ($students) {
            foreach ($students as $student) {
                echo 'chunk date : <br>';
                echo $student->name;
                echo $student->email;
                echo '<br>';
            }
            echo '<br>';
            return true; // return false to show only first 3 rows
        });
            @endphp
            </pre>
        <br>
    <hr>

</body>
</html>