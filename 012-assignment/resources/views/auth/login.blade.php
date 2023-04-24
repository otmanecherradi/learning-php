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
        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                    Login
                </h1>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-2xl py-6 sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow rounded-md">
                    <form
                        action="/auth/login/"
                        method="POST"
                    >
                        @csrf
                        <div class="bg-white p-6">
                            <div class="grid grid-cols-6 gap-6 mb-2">
                                <div class="col-span-6">
                                    <label
                                        for="email"
                                        class="block text-sm font-medium text-gray-700"
                                        >E-mail</label
                                    >
                                    <input
                                        type="email"
                                        name="email"
                                        id="email"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    />
                                </div>
                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6">
                                    <label
                                        for="password"
                                        class="block text-sm font-medium text-gray-700"
                                        >Password</label
                                    >
                                    <input
                                        type="password"
                                        name="password"
                                        id="password"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                            <button
                                type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            >
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </body>
</html>
