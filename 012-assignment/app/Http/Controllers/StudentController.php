<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Branch;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $students = Student::all();

    if ($request->query('branch_pk', null) != null)
      $students = Student::query()->where('branch_pk', '=', $request->query('branch_pk'))->get();

    return view('students.index', array('students' => $students, 'branches' => Branch::all()));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $users = DB::table('users')->where('is_admin', '=', false)->get();
    return view('students.form', array('student' => null, 'edit' => false, 'branches' => Branch::all(), 'users' => $users));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreStudentRequest $request)
  {
    $s = new Student();
    $s->first_name = $request->input('first_name');
    $s->last_name = $request->input('last_name');
    $s->gender = $request->input('gender');
    $s->branch_pk = $request->input('branch');
    $s->save();

    return redirect('/students');
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
    $users = DB::table('users')->where('is_admin', '=', false)->get();
    return view('students.form', array('student' => $student, 'edit' => true, 'branches' => Branch::all(), 'users' => $users));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateStudentRequest $request, Student $student)
  {
    $student->first_name = $request->input('first_name');
    $student->last_name = $request->input('last_name');
    $student->gender = $request->input('gender');
    $student->branch_pk = $request->input('branch');
    $student->user_id = $request->input('user');
    $student->save();
    return redirect('/students');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Student $student)
  {
    $student->delete();
    return redirect('/students');
  }
}
