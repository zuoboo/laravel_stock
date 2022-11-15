<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            追加・消費
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font relative">
                        <form action="{{ route('items.update',['item' => $item->id]) }}" method="post">
                        {{-- <form action="/items/1" method="post"> --}}
                            @csrf
                            @method('put')
                            <div class="container px-2 py-4 mx-auto">
                                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                    {{-- <div class="flex flex-wrap -m-2"> --}}
                                        <div class="p-2">
                                            <div class="relative">
                                                <label for="quantity" class="leading-7 text-sm text-gray-600">在庫</label>
                                                <input type="number" id="quantity" name="quantity"
                                                    class="w-3/4 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                <button type="submit"
                                                    class="w-1/4 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">追加する</button>
                                            </div>
                                        </div>
                                    {{-- </div> --}}
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
