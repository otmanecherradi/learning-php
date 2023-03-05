<?php
$pdo = require_once('../../db/connection.php');

include_once('../../includes/helpers.php');

include_once('../../db/users.php');
if (!ic('user')) {
  header('location: /login.php');
  die();
}
$account = Users::byUsername(c('user'));
if (isset($account['student_cne'])) {
  header('Location: /ihm/absences/index.php');
  die();
}



include('../../includes/head.php');

include_once('../../includes/nav.php');

include_once('../../db/students.php');

if (!ig('action')) {
  header('Location: /ihm/students/index.php');
  die();
}

$action = g('action');

$student = [];

if ($action == 'add') {
  $student = [
    'cne' => '',
    'name' => '',
    'group' => ''
  ];
}

if ($action == 'update') {
  if (!ig('cne')) {
    header('Location: /ihm/students/index.php');
    die();
  }

  $student = Students::byCNE(g('cne'));
}

?>

<?php
nav('students');
?>

<header class="bg-white shadow">
  <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold tracking-tight text-gray-900">Students</h1>
  </div>
</header>
<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <div class="flex flex-wrap mb-4">
      <a href="/ihm/students/index.php"
        class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Show
        Student</a>
    </div>

    <div class="flex flex-wrap justify-center -m-2">
      <?php

      ?>
      <div class="mt-5">
        <form action="/tasks/students.php?action=<?= $action ?>" method="POST">

          <div class="overflow-hidden shadow rounded-md">
            <div class="bg-white p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6">
                  <label for="cne" class="block text-sm font-medium text-gray-700">CNE</label>

                  <?php if ($action == 'update') {
                    ?>
                    <input type="hidden" name="cne" value="<?= $student['cne'] ?>">
                    <div
                      class="mt-1 px-3 py-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                      <?= $student['cne'] ?>
                    </div>
                  <?php
                  } else {
                    ?>
                    <input type="text" name="cne" id="cne" autocomplete="text"
                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm"
                      value="<?= $student['cne'] ?>">
                  <?php
                  } ?>

                </div>

                <div class="col-span-4">
                  <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                  <input type="text" name="name" id="name" autocomplete="text"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    value="<?= $student['name'] ?>">
                </div>

                <div class="col-span-6 lg:col-span-2">
                  <label for="group" class="block text-sm font-medium text-gray-700">Group</label>
                  <input type="text" name="group" id="group" autocomplete="address-level2"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    value="<?= $student['group'] ?>">
                </div>


              </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
              <button type="submit"
                class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
            </div>
          </div>
        </form>
      </div>

      <?php



      ?>
    </div>
  </div>
</main>

<?php
include('../../includes/tail.php');
?>
