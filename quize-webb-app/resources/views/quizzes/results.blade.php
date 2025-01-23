<x-app-layout>
    <div class="max-w-4xl mx-auto mt-10 bg-white shadow-lg rounded-lg p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Results for {{ $quiz->name }}</h1>
        <p class="text-xl text-gray-700 font-semibold mb-4">Your Score:
            <span class="text-green-500">{{ $score }}</span> /
            <span class="text-gray-500">{{ $totalQuestions }}</span>
        </p>
        <div class="flex justify-end">
            <a href="{{ route('quizzes.index') }}"
               class="bg-blue-500 text-white font-bold px-6 py-3 rounded-lg shadow hover:bg-blue-600 transition duration-200">
                Back to Quizzes
            </a>
        </div>
    </div>
</x-app-layout>
