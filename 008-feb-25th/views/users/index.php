<?php

include_once ROOT . 'views/includes/nav.php';

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

      foreach ($ctx['users'] as $user) {

        ?>
        <div class="w-full mb-4">
          <div class="flex items-center border-gray-200 border p-4 rounded-lg">
            <div class="flex-grow">
              <h2 class="text-gray-900 title-font font-medium">
                <a href="/index.php?url=users/<?= $user->id ?>/update">
                  <?= $user->username ?>
                </a>
              </h2>
              <p class="text-gray-500">
                Role:
                <?= $user->student_cne ? 'student' : 'admin' ?>
              </p>
            </div>
            <a class="p-3" href="/index.php?url=users/<?= $user->id ?>/update">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-edit">
                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
              </svg>
            </a>
            <a class="p-3" href="/index.php?url=users/<?= $user->id ?>/confirm">
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


      ?>

    </div>
  </div>
</main>
