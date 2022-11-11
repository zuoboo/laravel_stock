<x-app-layout>
    <x-slot name="header">
        TODOリスト
    </x-slot>

    <body class="flex flex-col min-h-[100vh]">
        <main class="grow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6">
                <div class="py-[100px]">
                    <p class="text-2xl font-bold text-center">本日も積み上げよう！</p>
                    <form action="{{ route('tasks.store') }}" method="post" class="mt-10">
                        @csrf
                        <div class="flex flex-col items-center">
                            <label class="w-full max-w-3xl mx-auto">
                                <input
                                    class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-4 pl-4 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"
                                    placeholder="保育園迎え" type="text" id="name" name="name" />
                                @if ($errors->any())
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                        role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </label>
                            <button type="submit"
                                class="mt-8 p-4 bg-slate-800 text-white w-full max-w-xs hover:bg-slate-900 transition-colors">
                                追加する
                            </button>
                        </div>
                    </form>
                    @if ($tasks->isNotEmpty())
                        <section class="text-gray-600 body-font">
                            <div class="container px-5 py-24 mx-auto">
                                <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                                    <table class="table-auto w-full text-left whitespace-no-wrap">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="w-3/4 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-blue-100 rounded-tl rounded-bl">
                                                    TODO</th>
                                                <th
                                                    class="w-1/4 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-blue-100">
                                                    操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tasks as $task)
                                                <tr>
                                                    <td class="px-4 py-3 bg-blue-50">{{ $task->name }}</td>
                                                    <td class="px-4 py-3 bg-blue-50">
                                                        <div class="flex justify-end">
                                                            <div>
                                                                <form
                                                                    action="{{ route('tasks.edit', ['task' => $task->id]) }}"
                                                                    class="inline-block text-gray-500 font-medium">
                                                                    <button type="submit"
                                                                        class="bg-blue-500 py-4 w-20 text-white md:hover:bg-blue-500 transition-colors">編集</button>
                                                                </form>
                                                            </div>
                                                            <div>
                                                                <form
                                                                    method="post" action="{{ route('tasks.update', ['task' => $task->id]) }}"
                                                                    class="inline-block text-gray-500 font-medium">
                                                                    @csrf
                                                                    @method('put')
                                                                    <input type="hidden" name="status" value="{{ $task->status }}">
                                                                    <button type="submit"
                                                                        class="bg-blue-500 py-4 w-20 text-white md:hover:bg-blue-500 transition-colors">できた！</button>
                                                                </form>
                                                            </div>
                                                            <div>
                                                                <form
                                                                    method="post" onclick="return deletePost(this)" action="{{ route('tasks.destroy', ['task' => $task->id]) }}"
                                                                    class="inline-block text-gray-500 font-medium">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit"
                                                                        class="bg-blue-500 py-4 w-20 text-white md:hover:bg-blue-500 transition-colors">削除</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>
                    @endif
                </div>
            </div>
        </main>
        <script>
            function deletePost(e) {
                'use strict';
                return confirm('本当に削除してもいいですか？');
            }
        </script>
    </body>
</x-app-layout>
