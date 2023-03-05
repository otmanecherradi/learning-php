<?php

class Etudiants extends Controller
{

  public function __construct()
  {
    parent::__construct('Etudiant');
  }

  public function index()
  {

  }

  public function show($id)
  {

  }

  public function destroy($id)
  {


  }

  public function store($request)
  {

  }

  public function edit($id)
  {

  }

  public function update($id, $request)
  {

  }
  public function create()
  {

    $this->view("form");

  }


}
