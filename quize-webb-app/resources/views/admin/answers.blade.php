<x-app-layout>
    <div class="max-w-4xl mx-auto mt-10 bg-white shadow-lg rounded-lg p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Student Quiz Results</h1>

        <div class="space-y-6">
            @foreach($studentsResults as $studentResult)
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold text-gray-800">{{ $studentResult['student_name'] }}</h3>
                    <div class="mt-4 space-y-4">
                        @foreach($studentResult['results'] as $quizResult)
                            <div class="bg-white p-4 rounded-lg shadow">
                                <p class="font-medium text-lg text-gray-800">{{ $quizResult['quiz_name'] }}</p>
                                <p class="text-gray-600">Correct Answers:
                                    <span class="font-semibold text-blue-600">{{ $quizResult['correct_answers'] }} / {{ $quizResult['total_questions'] }}</span>
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
