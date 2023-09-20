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
    <hr color="red">
    <hr color="red">
    <hr color="red">

    <br>
        <b>Aggregation Methods : </b>
        <br>
        <br>
            <b><i>Count Method</i> : </b> students count : is  {{ $students_count }}    <br>
            <b><i>min Method</i> : </b> students min 'id' column is : {{ $students_min }}       <br>
            <b><i>max Method</i> : </b> students max 'id' column is : {{ $students_max }}       <br>
            <b><i>sum Method</i> : </b> students sum 'id' column is : {{ $students_sum }}       <br>
        <br>
    <hr>

    <br>
        <b>exists() & doesntExist() Methods : </b>
        <br>
        <br>
            <b><i>exist()</i> : </b> {{ $students_exist }}    <br>
            <b><i>doesntExist()</i> : </b> {{ $students_doesntExist }} <br>
        <br>
    <hr>

    <br>
        <b>Select Method [ only name and email ]: </b>
        <br>
        <br>
        <pre>
            @foreach ($students_select as $student)

                name : {{ $student->name }} , email : {{ $student->email }},

            @endforeach
            </pre>
        <br>
    <hr>

    <br>
        <b>Select Method [ all columns ]: </b>
        <br>
        <br>
        <pre>
            @foreach ($students_select_all_columns as $student)

                name : {{ $student->name }} , email : {{ $student->email }} , city : {{ $student->city }}

            @endforeach
            </pre>
        <br>
    <hr>

    <br>
        <b>Distinct Method [ all columns without duplicated data rows ]: </b>
        <br>
        <br>
        <pre>
            @foreach ($students_distinct as $student)

                name : {{ $student->name }} , email : {{ $student->email }} , city : {{ $student->city }}

            @endforeach
            </pre>
        <br>
    <hr>

</body>
</html>
