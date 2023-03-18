<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>User - add / update</title>

        <script src="/css.js" ></script>

    </head>
    <body class="container">



<header class="bg-white shadow">
  <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold tracking-tight text-gray-900">Users</h1>
  </div>
</header>
<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <div class="flex flex-wrap mb-4">
      <a href="/users/"
        class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Show
        Users</a>
    </div>

    <div class="flex flex-wrap justify-center -m-2">
      <?php

      ?>
      <div class="mt-5">
        <form action="/users/<?= $edit ? $user->id.'/edit' : 'create' ?>" method="POST">
          @csrf

          <div class="overflow-hidden shadow rounded-md">
            <div class="bg-white p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6">

                  <?php if ($edit) {
                    ?>
                    @method('PUT')
                  <?php
                  } ?>

                </div>

                <div class="col-span-4">
                  <label for="username" class="block text-sm font-medium text-gray-700">Name</label>
                  <input type="text" name="name" id="name" autocomplete="text"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    value="<?= $edit ? $user->name : '' ?>">
                </div>

                <div class="col-span-4">
                  <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                  <input type="text" name="email" id="email" autocomplete="text"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    value="<?= $edit ? $user->email : '' ?>">
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


    </body>
</html>
