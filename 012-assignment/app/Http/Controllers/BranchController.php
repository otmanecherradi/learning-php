<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use App\Models\Branch;

class BranchController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('branches.index', array('branches' => Branch::all()));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('branches.form', array('branch' => null, 'edit' => false));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreBranchRequest $request)
  {
    $b = new Branch();
    $b->name = $request->input('name');
    $b->save();

    return redirect('/branches');
  }

  /**
   * Display the specified resource.
   */
  public function show(Branch $branch)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Branch $branch)
  {
    return view('branches.form', array('branch' => $branch, 'edit' => true));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateBranchRequest $request, Branch $branch)
  {
    $branch->name = $request->input('name');
    $branch->save();
    return redirect('/branches');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Branch $branch)
  {
    $branch->delete();
    return redirect('/branches');
  }
}
