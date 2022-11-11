<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            在庫管理
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font relative">
                        <div class="container py-4 mx-auto">
                            <div class="lg:w-4/5 w-full mx-auto overflow-auto py-4">
                                <a href="{{ url('items/create') }}" class="btn bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">登録</a>
                            </div>
                            <div class="lg:w-4/5 w-full mx-auto overflow-auto">
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
        </div>
    </div>
</x-app-layout>
