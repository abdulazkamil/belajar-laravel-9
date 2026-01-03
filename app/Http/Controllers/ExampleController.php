<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

use Database\Seeders\StudentSeeder;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Activity;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class ExampleController extends Controller
{
    //untuk menampilkan data dalam bentuk pagination
    public function index(){


       $user = Auth::user();
       $id = Auth::id();


        // $students = Student::all(); menampilkan semua data yang ada pada tabel
        // $teachers = Teacher::all();   menampilkan semua data yang ada pada tabel
         $students = Student::paginate(2);  //membuat pagination pada sebuah tabel pada saat ditampilkan
        $teachers = Teacher::paginate(2);    //membuat pagination pada sebuah tabel pada saat ditampilkan
        return view ('index', ['students'=> $students, 'teachers'=> $teachers, 'user'=> $user, 'id'=>$id]);
    }
    // untuk menampilkan  data pada sebuah tabel
    public function show($id){

        $student = Student::find($id);
        return view ('show', [ 'student' => $student]);
    }

    // untuk menambahkan data ke dalam database
    public function create()
    {
        return view('create');
    }

    public function store (Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'score' => 'required'
        ]);

        Student::create([
            'name' => $request->name,
            'score' => $request->score,
            'teacher_id'=> 1
        ]);

        return Redirect::route('index');
    } 


    public function edit(Student $student)
    {
        return view('edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $student->update([
            'name'=> $request->name,
            'score'=> $request->score
        ]);

        return Redirect::route('index');
    }

    public function delete(Student $student)
    {
        $student->delete();
        return Redirect::route('index');
    }
}
