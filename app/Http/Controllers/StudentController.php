<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = DB::select('select * from students');
        // dd($students);

        $students = DB::select('select * from students where id = ?', [1]);
        // dd($students);

        $students = DB::select('select * from students where city = ?', ['Damascus']);
        // dd($students);

        $students = DB::select('select * from students where city = :city', ['city' => 'New Jeremyberg']);
        // dd($students);

        $students = DB::select('select * from students where city = :city and id > :id ', ['city' => 'Damascus', 'id' => '1']);
        // dd($students);

        $students = DB::select('select * from students where city = :city and id > 1 ', ['city' => 'Damascus']);
        // dd($students);



        $students = DB::select('select * from students');

        return view('students', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $name = "John Doe";
        $email = "johndoe@example.com";
        $city = "New York";

        // best # 1
        // DB::table('students')->insert(['name' => $name, 'email' => $email, 'city' => $city]);

        // best # 2
        // DB::insert('insert into students (name, email, city) values (:name, :email, :city)', ['name'=> $name,'email' => $email ,'city' => $city]);

        // other correct ways :

        // DB::table('students')->insert(['name' => $name, 'email' => $email, 'city' => $city]);

        // DB::insert('insert into students (name, email, city) values (?, ?, ?)', ['insert', 'insert@gmail.com', 'Aleppo']);

        // DB::insert('insert into students (name, email, city) values (:name, :email, :city)', ['name'=>'insert','email' =>'insert@gmail.com','city' =>'Aleppo']);



    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {

        // way#1 :

        DB::update('update students set city = :city  where id = 2 ', ['Damascus']);

        //way#2 :

        DB::update('update students set city = :city  where id = :id ', ['Homs', 2]);

        //way#3 :

        DB::update('update students set city = :city  where id = :id ', ['city' => 'Latakia', 'id' => 2]);

        // way#4 :

        $id = 1;
        $city = 'Damascus';
        DB::update('update students set city = ?  where id >= ? ', [$city, $id]);

        // way#5 :

        $id = 1;
        $city = 'Damascus';
        DB::update('update students set city = :city  where id >= :id ', ['city' => $city, 'id' => $id]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
         // way 1 :
    DB::delete('delete from students where id > ?', [2]);

    // way 2 :
     DB::delete('delete from students where id > :id ', ['id' => 2]);

    }
}
