<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Display Validation Errors -->
            @include('common.errors')

            <div class="bg-white p-6 rounded-lg shadow-md">


        

                <!-- New Task Form -->
                <form action="{{ route('task.store') }}" method="POST" class="form-horizontal">
                    @csrf


                    <div class="mb-4">
                        <label for="task-name" class="inline text-gray-700 text-sm font-bold mb-2">Select category</label> or <a class="underline text-blue-600 hover:text-blue-800 visited:text-purple-600" href="{{ route('categories') }}">add new category<a>

                        <select name="category_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="" disabled selected>Select a category</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach

                        </select>
            
                    </div>

                    <!-- Task Name -->
                    <div class="mb-4">
                        <label for="task-name" class="block text-gray-700 text-sm font-bold mb-2">Task</label>

                            <input type="text" name="name" id="task-name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required minlength="6" maxlength="255" value="{{ old('name') }}">
            
                    </div>

                    <!-- Add Task Button -->
                    <div class="mb-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                            <i class="fa fa-plus"></i> Add Task
                        </button>
                    </div>
                </form>

                
                @if (count($tasks) > 0)

                    <div class="border rounded-lg shadow-lg">
                        <div class="bg-gray-200 p-4 font-bold">
                            Current Tasks
                        </div>

                        <div class="p-4">
                            <table class="table-auto w-full">
                                <!-- Table Headings -->
                                <thead>
                                    <th class="px-4 py-2">Task</th>
                                    <th class="px-4 py-2">&nbsp;</th>
                                </thead>

                                <!-- Table Body -->
                                <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <!-- Task Name -->
                                            <td class="border px-4 py-2">
                                                <div>{{ $task->name }}</div>
                                            </td>
                                           
                                            <td class="border px-4 py-2">
                                               <form action="{{ route('task.delete', $task) }}" method="POST">

                                                    @method('DELETE')
                                                    @csrf

                                                    <button class="btn bg-red-500 text-white px-4 py-3" id="delete-task-{{ $task->id }}" type="submit">
                                                        <i class="fa fa-btn fa-trash">
                                                        Delete
                                                    </button>
                                               </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                @endif

            </div>
        </div>
    </div>
</x-app-layout>
