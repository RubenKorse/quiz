<x-app-layout>
    <div class="max-w-4xl mx-auto mt-10 bg-white shadow-lg rounded-lg p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Select a Quiz</h1>
        <ul class="space-y-4">
            @foreach($quizzes as $quiz)
                <li>
                    <a href="{{ route('quiz.show', $quiz->id) }}"
                       class="block bg-blue-500 text-white font-bold px-6 py-3 rounded-lg shadow hover:bg-blue-600 transition duration-200">
                        {{ $quiz->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
