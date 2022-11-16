<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            在庫管理
        </h2>
    </x-slot>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if (session('message'))
            $(function() {
                toastr.success('{{ session('message') }}');
            });
        @endif
    </script>


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
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-blue-100">
                                                操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                            <tr>
                                                <td class="px-4 py-3 bg-blue-50">{{ $item->name }}</td>
                                                @if ($item->quantity <= 1)
                                                <td class="px-4 py-3 text-rose-600 bg-blue-50">{{ $item->quantity }}</td>
                                                <td>
                                                    <div class="px-4 py-3 bg-blue-50">{{ $item->memo }}</div>
                                                    <div class="px-4 text-rose-600 bg-blue-50">在庫が少ないので買いに行って下さい。</div>
                                                </td>
                                                @else
                                                <td class="px-4 py-3 bg-blue-50">{{ $item->quantity }}</td>
                                                <td class="px-4 py-3 bg-blue-50">{{ $item->memo }}</td>
                                                @endif
                                                <td class="px-4 py-3 bg-blue-50">
                                                    <a class="btn bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full" href="{{ route('items.edit', ['item' => $item->id ])}}">在庫編集</a></td>
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
