<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryBuilder_36_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = DB::table('students')->where('city','Ilamouth')->first();

        $student_email = DB::table('students')->value('email');
        // $student_email = DB::table('students')->where('city','Ilamouth')->value('email');

        $student_find = DB::table('students')->find(3);

        $students_pluck_one_column = DB::table('students')->pluck('name');

        $students_pluck_tow_columns = DB::table('students')->pluck('city','name');

        // Aggregate Methods :
            //count :
            $students_count = DB::table('students')->count();
            //min value :
            $students_min = DB::table('students')->min('id');
            //max value :
            $students_max = DB::table('students')->max('id');
            //sum value :
            $students_sum = DB::table('students')->sum('id');

        /*
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
        });
        */
        return view('students36', [
            'student_first' => $student ,
             'student_email' => $student_email ,
             'student_find' => $student_find ,
            'students_pluck_one_column' => $students_pluck_one_column ,
            'students_pluck_tow_columns'=> $students_pluck_tow_columns,
           /* 'students_chunk'=> $students_chunk, */
            'students_count'=> $students_count,
            'students_min'=> $students_min,
            'students_max'=> $students_max,
            'students_sum'=> $students_sum,
         ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
