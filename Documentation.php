<?php

/**
 *
 *  Youtube Link : https://www.youtube.com/playlist?list=PLbGui_ZYuhijEqjCa63l0GkWh5EsG5iTR
 *
 *  Videos Link  35 -> 39 : https://www.youtube.com/watch?v=TAJhL5Hyvo4&list=PLbGui_ZYuhijEqjCa63l0GkWh5EsG5iTR&index=35&pp=iAQB
 *
 */


//___________________________________________________________________________________________________________________________//
//_____________________________________ 35. How to Run SQL Queries in Laravel (Hindi) _______________________________________//
//___________________________________________________________________________________________________________________________//

 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                            config\database.php
 /*

    'default' => env('DB_CONNECTION', 'mysql'),

    you can change the database type from here (mysql-sqlserver-sqlite-....)

 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  11:00                                             PhpMyAdmin and .env Configurations
 /*
    - download xampp or laragon and turn it on
    - open phpmyadmin
    - make new database by utf8_general_ci and name it (for example : laravel_hindi_querybuilder )
    - go to .env and configure as below :

        DB_DATABASE=laravel_hindi_querybuilder
        DB_USERNAME=root
        DB_PASSWORD=



 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//13:13                                             Running SQL Queries
 /*
    to run  SQL Queries you should use DB Facade  for any database operation (select , update , insert , delete .....)
    as this :

    use Illuminate\Support\Facades\DB;


 */

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///13:47                                            Select() Method
/*
/   - select returns an array of results
/
/   grammer :
/
/   Db::select($sql_query, $parameters_bindings)
/
/   $sql_query : the query you want to execute
/   $parameters_bindings : the parameters values in the $sql_query
/
/
/   - example :
/     - We make a Student Migration, Model, Controller, Requests, Policy , Factory and Seeder
/     - We make a dummy data with student seeder and factory by th command : php artisan migrate:fresh --seed
/
/       on student_table we have id,name,email and city :
/
        $students = DB::select('select * from students');
        $students = DB::select('select * from students where id = ?', [1]) ;
        $students = DB::select('select * from students where city = ?', ['Damascus']) ;
        $students = DB::select('select * from students where city = :city', ['city'=>'New Jeremyberg']) ;
        $students = DB::select('select * from students where city = :city and id > :id ', ['city'=>'Damascus','id'=>'1']) ;
        $students = DB::select('select * from students where city = :city and id > 1 ', ['city'=>'Damascus']) ;




 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  30:00                                           insert() Method
 /*
     grammer :

     DB::insert($sql_query, $parameters_bindings);

     DB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle'])

     $sql_query : the query you want to execute
     $parameters_bindings : the parameters values in the $sql_query

    - examples (on the student controller 'store method'):

    ///////////////////////
    way#1 :

    $name = "John Doe";
    $email = "johndoe@example.com";
    $city = "New York";

    DB::table('students')->insert(['name' => $name, 'email' => $email, 'city' => $city]);

    ///////////////////////

    way#2 :

    DB::insert('insert into students (name, email, city) values (?, ?, ?)', ['insert', 'insert@gmail.com', 'Aleppo']);

    ///////////////////////

    way#3 :

    DB::insert('insert into students (name, email, city) values (:name, :email, :city)', ['name'=>'insert','email' =>'insert@gmail.com','city' =>'Aleppo']);

    ///////////////////////

    way#4 :

    $name = "John Doe";
    $email = "johndoe@example.com";
    $city = "New York";

    DB::insert('insert into students (name, email, city) values (:name, :email, :city)', ['name'=> $name,'email' => $email ,'city' => $city]);

 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//37:00                                             update() Method
 /*
    used for update existing row (or more ) values (one column or more)

    grammer :

    DB::update($query, $parameters_bindings);

    DB::update('update users set votes = 100 where name = ?', ['John']);

    examples :

       // way#1 :

       DB::update('update students set city = :city  where id = 2 ', ['Damascus']);

       //way#2 :

       DB::update('update students set city = :city  where id = :id ', ['Homs',2]);

       //way#3 :

       DB::update('update students set city = :city  where id = :id ', ['city'=>'Latakia','id' => 2]);

       // way#4 :

       $id = 1 ;
       $city = 'Damascus' ;
       DB::update('update students set city = ?  where id >= ? ', [ $city, $id ]);

       // way#5 :

       $id = 1 ;
       $city = 'Damascus' ;
       DB::update('update students set city = :city  where id >= :id ', ['city'=>$city,'id' => $id]);



 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//41:00                                              delete() Method
 /*
    used for delete existing row (or more )

    grammer :

    DB::update($query, $parameters_bindings);

        DB::delete('delete from students where id = ?', [4]);  // DONT FORGET 'FROM' in the query

    examples :

    // way 1 :
    DB::delete('delete from students where id > ?', [2]);

    // way 2 :
     DB::delete('delete from students where id > :id ', ['id' => 2]);

 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//42:35                                     unprepared statement
 /*
        it is a query without any binding parameters

        ( IT DOESN'T WORK now in laravel 10)

 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//44:00                                     Database Transactions
 /*

    used to run a set of operations within a database transaction :

    The WHOLE transaction will be applied or cancelled

    examples :

    DB::transaction(function () {

            // DB::insert('insert into students (name, email, city) values (:name, :email, :city)', ['name'=> $name,'email' => $email ,'city' => $city]);
            DB::update('update students set city = :city  where id = :id ', ['city' => 'Latakia', 'id' => 2]);
            DB::delete('delete from students where id > ?', [2]);

        },3);

    *******
    he didn't explain these topics :
    // DB::beginTransaction();
    // DB::commit();
    // DB::rollback();
    *******
                                                THE END OF VIDEO 35 👋
 */

 //___________________________________________________________________________________________________________________________//
//_________________________________________ 36. Query Builder in Laravel (Hindi) ____________________________________________//
//___________________________________________________________________________________________________________________________//

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
 /*
        The laravel query builder uses PDO (Php Data Object) parameter binding
        to protect your application against SQL Injection Attacks .

 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//03:22                                         Retrieving All Rows From a Table
 /*
        we use DB::table with get() Method like this ;
        $students = DB::table('students')->get();
 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//18:12                                         Retrieving SINGLE Row From a Table : first() Method
 /*
        we use DB::table with first() Method like this ;

        $student = DB::table('students')->where('city','Ilamouth')->first();

 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//18:59                                          Retrieving SINGLE Column for a single row From a Table : value () Method
 /*
        we use DB::table with value() Method to determine the column like this :

        $student_email = DB::table('students')->where('city','Ilamouth')->value('email');



 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//19:00                                         Retrieving SINGLE Row From a Table By id : find() Method
 /*
        we use DB::table with value() Method to determine the row by id like this :
        - find method has id as a parameter ONLY

        $student_find = DB::table('students')->find(3);
 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//24:30                                         Retrieving one column multiple Rows with pluck() Method
 /*



        $students_pluck_one_column = DB::table('students')->pluck('name');

        $students_pluck_tow_columns = DB::table('students')->pluck('city','name'); // city is the value , name is the key


 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//26:30                                         chunking results
 /*
        The chunk method in Laravel is used to process a large set of database records in chunks, instead of
        loading all the records into memory at once.
         This can be useful when dealing with a large number of records to prevent memory issues.

        The syntax of the chunk method is as follows:

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

 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//30:55                                         Aggregate () Methods

 /*
    //count :
                     $students_count = DB::table('students')->count();
    //max value :
                     $students_min = DB::table('students')->min('id');  // you should enter the column name
    //min value :
                     $students_max = DB::table('students')->max('id');  // you should enter the column name
    //sum value :
                     $students_sum = DB::table('students')->sum('id');

 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//33:00                                         exists() & doesntExist() Methods
 /*
        //exists Method :

            $students_exist = DB::table('students')->where('id', '=', 5)->exists(); //true

            if ($students_exist = DB::table('students')->where('id', '=', 5)->exists()) {
                return true;
            }

        //doesntExist Method :

            $students_doesntExist = DB::table('students')->where('id', '=', 5)->doesntExist(); //false (Null in View)

            if ($students_doesntExist = DB::table('students')->where('id', '=', 5)->doesntExist() ) {
                return false;
            }


 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//36:00                                         select() Method
 /*
            // to select specific columns :

            $students_select = DB::table('students')->select('name','email')->get();

            // to select all columns :

            $students_select_all_columns = DB::table('students')->get();

 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//37:50                                         distinct() Method
 /*
            // to select Distinct rows :

            $students_distinct = DB::table('students')->distinct()->get(); // without duplicates or repeated rows


 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//38:38                                         where() Method
 /*
    Grammer :

    $students_where = DB::table('tableName')->where('column', 'operator','value')->get();

    // the 'operator' parameter can be : = ,  != or <>  , > , < , <= , >= , like , not like , ilike (Case-insensitive version of LIKE. Only available in PostgreSQL) , NOT ILIKE (Case-insensitive version of NOT LIKE. Only available in PostgreSQL.

    types of where methods :

    - Basic Where Clauses: The most basic usage of where requires three arguments, column name, operator, and value.

        $users = DB::table('users')->where('votes', '>', 100)->get();

    - Where Between: The whereBetween method verifies that a column's value is between two values:

        $users = DB::table('users')
                ->whereBetween('votes', [1, 100])->get();

    - Where Not Between: The whereNotBetween method verifies that a column's value lies outside of two values:

        $users = DB::table('users')
                ->whereNotBetween('votes', [1, 100])->get();

    - Where In: The whereIn method verifies that a column's value is contained within the given array:

        $users = DB::table('users')
                ->whereIn('id', [1, 2, 3])->get();

    - Where Not In: The whereNotIn method verifies that a column's value is not contained in the given array:

        $users = DB::table('users')
                ->whereNotIn('id', [1, 2, 3])->get();

    - Where Null: The whereNull method verifies that the value of the column is NULL:

        $users = DB::table('users')
                ->whereNull('updated_at')->get();

    - Where Not Null: The whereNotNull method verifies that the column's value is not NULL:

        $users = DB::table('users')
                ->whereNotNull('updated_at')->get();

    - Where Date: The whereDate method is used to compare a column's value against a date:

        $users = DB::table('users')
                ->whereDate('created_at', '2016-12-31')->get();

    - Where Month: The whereMonth method can be used to compare a column's value against a specific month:

        $users = DB::table('users')
                ->whereMonth('created_at', '12')->get();

    - Where Day: The whereDay method can be used to compare a column's value against a specific day of a month:

        $users = DB::table('users')
                ->whereDay('created_at', '31')->get();

    - Where Year: The whereYear method can be used to compare a column's value against a specific year:

        $users = DB::table('users')
                ->whereYear('created_at', '2016')->get();

    - Where Column: The whereColumn method can be used to verify that two columns are equal:

        $users = DB::table('users')
                ->whereColumn('first_name', 'last_name')->get();

    - Where Exists: The whereExists method can be used to write where exists SQL clauses:

        $users = DB::table('users')
                ->whereExists(function ($query) {
                    $query->select(DB::raw(1))
                            ->from('orders')
                            ->whereRaw('orders.user_id = users.id');
                })->get();

    Here's an example of how to use these operators)
    examples :

    // to get rows with WHERE Method :

        $students_where = DB::table('students')->where('id', '=',4)->get();

        // to get one row with where :

        $students_where = DB::table('students')->where('id', '=',4)->first();

        // way1 to get one column value with one row :

        $students_where_get_one_row_with_one_column_value = DB::table('students')->where('id', '=',4)->value('email');

        // way2 to get one column value with one row

        $students_where_get_one_column_inOneRow_with_first_method = DB::table('students')->where('id', '=',4)->first('email');

        // to get rows with like operator :
          // in begin :
            $students_where_like = DB::table('students')->where('name', 'like','s%')->get();
          // in end :
            $students_where_like_ending_character = DB::table('students')->where('name', 'like','%f')->get();


          */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//41:55                                            orWhere() Method
 /*
        all where methods can be with orwhere methods like :
        orWhereBetween

        examples :

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

 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//51:15                                         orderBy() Method
 /*

            $students_orderBy_asc = DB::table('students')->orderBy('id', 'asc')->get();

            $students_orderBy_desc = DB::table('students')->orderBy('id', 'desc')->get();


 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//53:00                                         latest() Method
 /*
        it deals mainly on dates only ,
            it is similar to order by descinding method when it has get() method
                to get the latest one row use latest with  firstt() method

        just like that :

            $students_latest = DB::table('students')->latest('created_at')->get();

            $students_latest_one_record_with_first_method = DB::table('students')->latest('created_at')->first();

 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//53:50                                         oldest() Method
 /*
        it shows the oldest date row of the rows

        eg :

            $students_oldestst_one_record_with_first_method = DB::table('students')->oldest('created_at')->first();


 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//54:15                                         inRandomOrder() Method
 /*
       get all rows randomly .

        $students_inRandomOrder = DB::table('students')->inRandomOrder()->get();

        get one row randomly .

        $students_inRandomOrder_one_row = DB::table('students')->inRandomOrder()->first();


 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//55:44                                         groupBy and Having Method
 /*
    Syntax :
        $students_groupBy_and_Having = DB::table('students')->groupBy($groups)->having($column, $operator, $value, $boolean, $);

    eg :
            $students_groupBy_and_Having = DB::table('students')->groupBy('id')->having('id','>','3')->get();

    - if you have ERROR like this :
        Illuminate\Database\QueryException SQLSTATE[42000]: Syntax error or access violation: 1055 'lay.student.id' isn't in GROUP BY (SQL: select * from 'student' group by 'marks' having 'marks' > 50)

        you can go to config->database.php :

            Replace         'strict' => true,

            with            'strict' => false,




 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//58:00                                         take() , skip() and limit() Methods
 /*

        $students_take = DB::table('students')->take(1)->get();

        $students_take_latest = DB::table('students')->take(1)->latest()->get();
        $students_skip_take = DB::table('students')->skip(3)->take(1)->get(); // begin from id=4

        $students_limit = DB::table('students')->limit(2)->get(); //
        $students_limit_with_offset = DB::table('students')->offset(5)->limit(2)->get(); //begin from id=6 and get 2 results

 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
 /*


 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
 /*


 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
 /*


 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
 /*


 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
 /*


 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
 /*


 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
 /*


 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
 /*


 */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
 /*


 */
