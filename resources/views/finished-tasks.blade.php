<x-app-layout>
    <x-slot name="header">
        できたもの
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">

                        <div class="container mx-auto">
                            <div class="lg:w-4/5 w-full mx-auto overflow-auto py-4">
                                <a href="{{ route('tasks.index') }}"
                                    class="btn bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">戻る</a>
                            </div>
                            <div class="lg:w-4/5 w-full mx-auto overflow-auto">
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
                                                <td class="px-4 py-3 bg-blue-50">{{ $task->updated_at }}</td>
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
