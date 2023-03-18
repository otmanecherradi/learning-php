<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Users</title>

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
    <div class="flex flex-wrap mb-4 justify-end">
      <a href="/users/create"
        class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Add
        User</a>
    </div>

    <div class="flex flex-wrap">
    @foreach ($users as $user)
        <div class="w-full mb-4">
          <div class="flex items-center border-gray-200 border p-4 rounded-lg">
            <div class="flex-grow">
              <h2 class="text-gray-900 title-font font-medium">
                <a href="">
                  <?= $user->name ?>
                </a>
              </h2>
              <p class="text-gray-500">
                email: <?= $user->email ?>
              </p>
            </div>
            <a class="p-3" href="/users/<?= $user->id ?>/edit">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-edit">
                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
              </svg>
            </a>

            <div>
              <form action="/users/<?= $user->id ?>/delete"
                method="post">
                @csrf
                @method('DELETE')
                <button type="submit"
                  class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Delete</button>
              </form>
            </div> 
          </div>
        </div>
        @endforeach
    </div>
  </div>
</main>


    </body>
</html>
