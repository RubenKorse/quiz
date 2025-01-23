<x-app-layout>
    <div class="bg-white shadow-lg rounded-lg p-6 w-full">
        <h2 class="text-2xl font-bold mb-4">Upload Quiz CSV</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 mb-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.quiz.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name">
                <label for="quiz_file" class="block text-sm font-medium text-gray-700">Choose a CSV file:</label>
                <input type="file" name="quiz_file" id="quiz_file" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">Upload Quiz</button>
        </form>
    </div>
</x-app-layout>
