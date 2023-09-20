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

    examples :

    // to get rows with WHERE Method :

        $students_where = DB::table('students')->where('id', '=',4)->get();

    // to get one row with where :

        $students_where = DB::table('students')->where('id', '=',4)->first();

    // way1 to get one column value with one row :

        $students_where_get_one_row_with_one_column_value = DB::table('students')->where('id', '=',4)->value('email');

    // way2 to get one column value with one row

        $students_where_get_one_column_inOneRow_with_first_method = DB::table('students')->where('id', '=',4)->first('email');

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
