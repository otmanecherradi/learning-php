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


include_once('../../db/users.php');


?>


<?php
nav('users');
?>

<header class="bg-white shadow">
  <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold tracking-tight text-gray-900">Users</h1>
  </div>
</header>
<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <div class="flex flex-wrap mb-4 justify-end">
      <a href="/ihm/users/form.php?action=add"
        class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Add
        User</a>
    </div>

    <div class="flex flex-wrap">
      <?php

      $users = Users::all();

      foreach ($users as $user) {


        ?>
        <div class="w-full mb-4">
          <div class="flex items-center border-gray-200 border p-4 rounded-lg">
            <div class="flex-grow">
              <h2 class="text-gray-900 title-font font-medium">
                <a href=""><?= $user['username'] ?></a>
              </h2>
              <p class="text-gray-500">
                Role: <?= $user['student_cne'] ? 'student' : 'admin' ?>
              </p>
            </div>
            <a class="p-3" href="/ihm/users/form.php?action=update&id=<?= $user['id'] ?>">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-edit">
                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
              </svg>
            </a>
            <a class="p-3" href="/ihm/users/index.php?confirm=<?= $user['id'] ?>">
              <svg class="text-red-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-delete">
                <path d="M21 4H8l-7 8 7 8h13a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"></path>
                <line x1="18" y1="9" x2="12" y2="15"></line>
                <line x1="12" y1="9" x2="18" y2="15"></line>
              </svg>
            </a>
          </div>
        </div>
      <?php

      }


      if (ig('confirm')) {
        ?>

        <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
          <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

          <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
              <form action="/tasks/users.php?action=delete"
                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg"
                method="post">
                <input type="hidden" name="id" value="<?= g('confirm') ?>">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                  <div class="sm:flex sm:items-start">
                    <div
                      class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                      <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 10.5v3.75m-9.303 3.376C1.83 19.126 2.914 21 4.645 21h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 4.88c-.866-1.501-3.032-1.501-3.898 0L2.697 17.626zM12 17.25h.007v.008H12v-.008z" />
                      </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                      <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Delete Users?</h3>
                      <div class="mt-2">
                        <p class="text-sm text-gray-500">Are you sure you want to delete Users? All
                          data will be permanently removed. This action cannot be undone.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                  <button type="submit"
                    class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Delete</button>
                  <a href="/ihm/users/index.php"
                    class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>


      <?php

      }

      ?>
    </div>
  </div>
</main>

<?php
include('../../includes/tail.php');
?>
