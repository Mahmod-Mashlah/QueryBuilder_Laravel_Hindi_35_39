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
            //exists Method :
            $students_exist = DB::table('students')->where('id', '=', 5)->exists(); //true

            if ($students_exist = DB::table('students')->where('id', '=', 5)->exists()) {
                // return true;
            }

            //doesntExist Method :
            $students_doesntExist = DB::table('students')->where('id', '=', 5)->doesntExist(); //false (Null in View)

            if ($students_doesntExist = DB::table('students')->where('id', '=', 5)->doesntExist() ) {
                // return false;
            }

            // to select specific columns :
            $students_select = DB::table('students')->select('name','email')->get();
            // to select all columns :
            $students_select_all_columns = DB::table('students')->get();
                // dd($students_select_all_columns);
            // to select Distinct rows :
            $students_distinct = DB::table('students')->distinct()->get(); // without duplicates or repeated rows
            // to get rows with WHERE Method :
            $students_where_id_equal_4 = DB::table('students')->where('id', '=',4)->get();
            $students_where_get_one_row_with_one_column_value = DB::table('students')->where('id', '=',4)->value('email');
            $students_where_get_one_column_inOneRow_with_first_method = DB::table('students')->where('id', '=',4)->first('email');

            $students_where_like_beginning_character = DB::table('students')->where('name', 'like','D%')->get();

            $students_where_like_ending_character = DB::table('students')->where('name', 'like','%f')->get();

            $students_orWhere_eg_1 = DB::table('students')
                                         ->where('id','5')
                                           ->orWhere('name', 'like','%f')->get();

            $students_orWhere_eg_2 = DB::table('students')
                                         ->where('id','5')
                                           ->orWhere('name', 'like','%f')
                                             ->orWhere('name', 'like','A%')->get();

            $students_orWhere_eg_3 = DB::table('students')
                                         ->where('id','5')
                                           ->orWhereBetween('id', [4,5])
                                             ->orWhere('name', 'like','A%')->get();


            $students_orderBy_asc = DB::table('students')->orderBy('id', 'asc')->get();
            $students_orderBy_desc = DB::table('students')->orderBy('id', 'desc')->get();

            $students_latest = DB::table('students')->latest('created_at')->get();
            $students_latest_one_record_with_first_method = DB::table('students')->latest('created_at')->first();

            $students_oldestst_one_record_with_first_method = DB::table('students')->oldest('created_at')->first();

            $students_inRandomOrder = DB::table('students')->inRandomOrder()->get();
            $students_inRandomOrder_one_row = DB::table('students')->inRandomOrder()->first();

            $students_groupBy_and_Having = DB::table('students')->groupBy('id')->having('id','>','3')->get();

            $students_take = DB::table('students')->take(1)->get();
            $students_take_latest = DB::table('students')->take(1)->latest()->get();
            $students_skip_take = DB::table('students')->skip(3)->take(1)->get(); // begin from id=4

            $students_limit = DB::table('students')->limit(2)->get(); //
            $students_limit_with_offset = DB::table('students')->offset(5)->limit(2)->get(); //begin from id=6

            $student_insert = DB::table('students')->insert([
                'name'=> 'test',
                'email'=> 'test',
                'city'=> 'test',
            ]);

            $student_insert_multiple_rows = DB::table('students')->insert([

                  ['name'=> 'test1','email'=> 'email1','city'=> 'city1',],
                  ['name'=> 'test2','email'=> 'email2','city'=> 'city2',],
                  ['name'=> 'test3','email'=> 'email3','city'=> 'city3',],
            ]);

            $student_insertOrIgnore = DB::table('students')->insert([

                'id'=> 1,
                'name'=> 'test',
                'email'=> 'test',
                'city'=> 'test',
            ]);

            $student_insert_and_return_id_itself = DB::table('students')->insertGetId([

                'name'=> 'test',
                'email'=> 'test',
                'city'=> 'test',
            ]);

            // Update() Methods :

            $student_update = DB::table('students')
                ->where('id', 2)
                    ->update([

                        'name'=> 'updated_name',
                        'email'=> 'updated_email',
                        'city'=> 'updated_city',

                             ]);

            $student_updateOrInsert = DB::table('students')
                ->where('id', 2)
                    ->updateOrInsert([

                        'name'=> 'updated_name',
                        'email'=> 'updated_email',
                        'city'=> 'updated_city',

                             ]);


            // Delete() method :

            $student_Delete = DB::table('students')->where('id','=',5)->delete();

            //Truncate() method

            DB::table('students')->truncate();

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

            'students_exist'=> $students_exist,
            'students_doesntExist'=> $students_doesntExist,
            'students_select'=> $students_select,
            'students_select_all_columns'=> $students_select_all_columns,
            'students_distinct'=> $students_distinct,

            'students_where_id_equal_4'=> $students_where_id_equal_4,
            'students_where_get_one_row_with_one_column_value'=> $students_where_get_one_row_with_one_column_value,
            'students_where_get_one_column_inOneRow_with_first_method'=> $students_where_get_one_column_inOneRow_with_first_method,

            'students_where_like_beginning_character'=> $students_where_like_beginning_character,
            'students_where_like_ending_character'=> $students_where_like_ending_character,

            'students_orWhere_eg_1'=> $students_orWhere_eg_1,
            'students_orWhere_eg_2'=> $students_orWhere_eg_2,
            'students_orWhere_eg_3'=> $students_orWhere_eg_3,

            'students_orderBy_asc'=> $students_orderBy_asc,
            'stuants_orderBy_desc'=> $students_orderBy_desc,

            'students_latest'=> $students_latest,
            'students_latest_one_record_with_first_method'=> $students_latest_one_record_with_first_method,
            'students_oldestst_one_record_with_first_method'=> $students_oldestst_one_record_with_first_method,
            'students_inRandomOrder'=> $students_inRandomOrder,
            'students_inRandomOrder_one_row'=> $students_inRandomOrder_one_row,

            'students_groupBy_and_Having'=> $students_groupBy_and_Having,
            'students_take'=> $students_take,
            'students_take_latest'=> $students_take_latest,
            'students_skip_take'=> $students_skip_take,
            'students_limit'=> $students_limit,
            'students_limit_with_offset'=> $students_limit_with_offset,

            // insert Data
            'student_insert'=> $student_insert,
            'student_insert_multiple_rows'=> $student_insert_multiple_rows,
            'student_insertOrIgnore'=> $student_insertOrIgnore,
            'student_insert_and_return_id_itself'=> $student_insert_and_return_id_itself,

            'student_update'=> $student_update,
            'student_updateOrInsert'=> $student_updateOrInsert,

            'student_Delete'=> $student_Delete,
            'student_truncate'=> 'truncate at line 157',


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
