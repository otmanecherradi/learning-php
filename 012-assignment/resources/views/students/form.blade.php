<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="h-full bg-gray-100"
>
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
        />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Branches</title>

        <script src="/css.js"></script>
    </head>

    <body class="h-full">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <a
                                    href="/dashboard/"
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"
                                    aria-current="page"
                                    >Dashboard</a
                                >
                                <a
                                    href="/branches/"
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"
                                    >Branches</a
                                >
                                <a
                                    href="/students/"
                                    class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium"
                                    >Students</a
                                >
                            </div>
                        </div>
                    </div>
                    <div>
                        <form
                            action="/auth/logout/"
                            method="POST"
                        >
                            @csrf
                            <button
                                type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            >
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                    Students
                </h1>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow rounded-md">
                    <form
                        action="/students/<?= $edit ? $student->pk.'/edit' : 'create' ?>"
                        method="POST"
                    >
                        @csrf
                        <?php if ($edit) { ?>
                        @method('PUT')
                        <?php } ?>

                        <div class="bg-white p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-3">
                                    <label
                                        for="firstName"
                                        class="block text-sm font-medium text-gray-700"
                                        >First name</label
                                    >
                                    <input
                                        type="text"
                                        name="first_name"
                                        id="firstName"
                                        autocomplete="text"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        value="<?= $edit ? $student->first_name : '' ?>"
                                    />
                                </div>
                                <div class="col-span-3">
                                    <label
                                        for="lastName"
                                        class="block text-sm font-medium text-gray-700"
                                        >Last name</label
                                    >
                                    <input
                                        type="text"
                                        name="last_name"
                                        id="lastName"
                                        autocomplete="text"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        value="<?= $edit ? $student->last_name : '' ?>"
                                    />
                                </div>
                                <div class="col-span-3">
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >Gender</label
                                    >
                                    <div>
                                        <input
                                            type="radio"
                                            name="gender"
                                            id="female"
                                            value="FEMALE"
                                            <?= $edit ? $student->gender == 'FEMALE' ? 'checked' : '' : '' ?>
                                        />
                                        <label for="female">Female</label>
                                        <input
                                            type="radio"
                                            name="gender"
                                            id="male"
                                            value="MALE"
                                            <?= $edit ? $student->gender == 'MALE' ? 'checked' : '' : '' ?>
                                        />
                                        <label for="male">Male</label>
                                    </div>
                                </div>
                                <div class="col-span-3">
                                    <label
                                        for="branch"
                                        class="block text-sm font-medium leading-6 text-gray-900"
                                        >Branch</label
                                    >
                                    <div class="mt-2">
                                        <select
                                            id="branch"
                                            name="branch"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                                        >
                                            <option value="">---</option>
                                            @foreach ($branches as $branch)
                                            <option 
                                                value="<?= $branch->pk ?>"
                                                <?= $edit ? $student->branch_pk == $branch->pk ? 'selected' : '' : '' ?>
                                                >
                                                <?= $branch->name ?>
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-span-3">
                                    <label
                                        for="user"
                                        class="block text-sm font-medium leading-6 text-gray-900"
                                        >User</label
                                    >
                                    <div class="mt-2">
                                        <select
                                            id="user"
                                            name="user"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                                        >
                                            <option value="">---</option>
                                            @foreach ($users as $user)
                                            <option 
                                                value="<?= $user->id ?>"
                                                <?= $edit ? $student->user_id == $user->id ? 'selected' : '' : '' ?>
                                                >
                                                <?= $user->email ?>
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                            <button
                                type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            >
                                Save
                            </button>
                        </div>
                    </form>
                    <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                        <?php if ($edit) { ?>
                        <form
                            action="/students/<?= $student->pk ?>/delete"
                            method="post"
                        >
                            @csrf @method('DELETE')
                            <button
                                type="submit"
                                class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm"
                            >
                                Delete
                            </button>
                        </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
