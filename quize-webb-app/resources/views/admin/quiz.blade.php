<x-app-layout>
    <div class="max-w-4xl mx-auto mt-10 bg-white shadow-lg rounded-lg p-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Upload Quiz CSV</h2>

        {{-- Error Messages --}}
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-lg">
                <h3 class="font-bold mb-2">Please fix the following errors:</h3>
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Success Message --}}
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        {{-- Form --}}
        <form action="{{ route('admin.quiz.upload') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            {{-- Quiz Name --}}
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Quiz Name</label>
                <input type="text" name="name" id="name" placeholder="Enter quiz name"
                       class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3">
            </div>

            {{-- Quiz File --}}
            <div>
                <label for="quiz_file" class="block text-sm font-medium text-gray-700 mb-2">CSV File</label>
                <input type="file" name="quiz_file" id="quiz_file"
                       class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2.5">
                <p class="text-sm text-gray-500 mt-1">Accepted formats: CSV, TXT (Max: 2MB).</p>
            </div>

            {{-- Submit Button --}}
            <div>
                <button type="submit"
                        class="w-full bg-blue-500 text-white font-bold py-3 rounded-lg shadow hover:bg-blue-600 transition duration-200">
                    Upload Quiz
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
