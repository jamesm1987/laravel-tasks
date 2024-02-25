<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Display Validation Errors -->
            @include('common.errors')

            <div class="bg-white p-6 rounded-lg shadow-md">


        

                <!-- New Category Form -->
                <form action="{{ route('category.store') }}" method="POST" class="form-horizontal">
                    @csrf


                    <!-- Category Name -->
                    <div class="mb-4">
                        <label for="category-name" class="block text-gray-700 text-sm font-bold mb-2">Category</label>

                            <input type="text" name="name" id="category-name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required minlength="3" maxlength="255" value="{{ old('name') }}">
            
                    </div>

                    <!-- Add Category Button -->
                    <div class="mb-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                            <i class="fa fa-plus"></i> Add Category
                        </button>
                    </div>
                </form>

                
                @if (count($categories) > 0)

                    <div class="border rounded-lg shadow-lg">
                        <div class="bg-gray-200 p-4 font-bold">
                            Categories
                        </div>

                        <div class="p-4">
                            <table class="table-auto w-full">
                                <!-- Table Headings -->
                                <thead>
                                    <th class="px-4 py-2">Category</th>
                                    <th class="px-4 py-2">&nbsp;</th>
                                </thead>

                                <!-- Table Body -->
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <!-- Category Name -->
                                            <td class="border px-4 py-2">
                                                <div>{{ $category->name }}</div>
                                            </td>
                                           
                                            <td class="border px-4 py-2">
                                               <form action="{{ route('category.delete', $category) }}" method="POST">

                                                    @method('DELETE')
                                                    @csrf

                                                    <button class="btn bg-red-500 text-white px-4 py-3" id="delete-category-{{ $category->id }}" type="submit">
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
