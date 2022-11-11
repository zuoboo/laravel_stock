<x-app-layout>
    <x-slot name="header">
        編集画面
    </x-slot>

    <body class="flex flex-col min-h-[100vh]">
        <main class="grow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6">
                <div class="py-[100px]">
                    <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="post" class="mt-10">
                        @method('put')
                        @csrf
                        <div class="flex flex-col items-center">
                            <label class="w-full max-w-3xl mx-auto">
                                <input
                                    class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-4 pl-4 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"
                                    value="{{ ($task->name )}}" type="text" id="name" name="name" />{{ old($task->name) }}
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
                                更新する
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </body>
</x-app-layout>
