<?php

include_once('Controller.php');

include_once(ROOT . 'Models/User.php');

class UsersController extends Controller
{

  public function __construct()
  {
    parent::__construct(User::class);
  }

  public function index()
  {

    // $account = $this->checkAuth();

    $this->view('index', [
      'users' => $this->model::All(),
      'page' => User::$table_name,

      'is_authenticated' => false,

      'account' => [],
    ]);

  }

  public function show($id)
  {
    $this->view('show', [
      'users' => $this->model::find($id),
      'page' => User::$table_name,

      'is_authenticated' => false,

      'account' => [],
    ]);
  }

  public function destroy($id)
  {


  }

  public function store($request)
  {

  }

  public function edit($id)
  {
    $this->view('form', [
      'user' => $this->model::find($id),
      'page' => User::$table_name,

      'is_authenticated' => false,

      'account' => [],

      'action' => 'update'
    ]);
  }

  public function update($id, $request)
  {

    $this->view('form', [
      'user' => $this->model::find($id),
      'page' => User::$table_name,

      'is_authenticated' => false,

      'account' => [],
    ]);
  }

  public function create()
  {

    $this->view("form");

  }


}
