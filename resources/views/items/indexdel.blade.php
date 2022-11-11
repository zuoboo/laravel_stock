<x-app-layout>
    <x-slot name="header">
        在庫管理
    </x-slot>

    <body class="flex flex-col min-h-[100vh]">
        <main class="grow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6">
                <div class="my-10 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <section class="text-gray-600 body-font">
                        <div class="container py-4 mx-auto">
                            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                                <table class="table-auto w-full text-left whitespace-no-wrap">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-blue-100">
                                                名前</th>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-blue-100">
                                                在庫</th>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-blue-100">
                                                メモ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                            <tr>
                                                <td class="px-4 py-3 bg-blue-50">{{ $item->name }}</td>
                                                <td class="px-4 py-3 bg-blue-50">{{ $item->quantity }}</td>
                                                <td class="px-4 py-3 bg-blue-50">{{ $item->memo }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </main>
    </body>
</x-app-layout>
