<x-app-layout>
    <x-slot name="header">
        できたもの
    </x-slot>


    <body class="flex flex-col min-h-[100vh]">
        <main class="grow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6">
                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-24 mx-auto">
                        <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                            <table class="table-auto w-full text-left whitespace-no-wrap">
                                <thead>
                                    <tr>
                                        <th
                                            class="w-3/5 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-blue-100 rounded-tl rounded-bl">
                                            TODO</th>
                                        <th
                                            class="w-2/5 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-blue-100">
                                            できた日時</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($finished_tasks as $task)
                                        <tr>
                                            <td class="px-4 py-3 bg-blue-50">{{ $task->name }}</td>
                                            <td class="px-4 py-3 bg-blue-50">{{ $task->updated_at}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </body>
</x-app-layout>
