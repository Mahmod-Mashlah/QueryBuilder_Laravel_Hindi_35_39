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

        $students = DB::select('select * from students where id = ?', [1]) ;
        // dd($students);

        $students = DB::select('select * from students where city = ?', ['Damascus']) ;
        // dd($students);

        $students = DB::select('select * from students where city = :city', ['city'=>'New Jeremyberg']) ;
        // dd($students);

        $students = DB::select('select * from students where city = :city and id > :id ', ['city'=>'Damascus','id'=>'1']) ;
        // dd($students);

        $students = DB::select('select * from students where city = :city and id > 1 ', ['city'=>'Damascus']) ;
        // dd($students);

        return view('students',['students' => $students]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
