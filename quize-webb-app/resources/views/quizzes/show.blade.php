<x-app-layout>
    <div class="max-w-4xl mx-auto mt-10 bg-white shadow-lg rounded-lg p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">{{ $quiz->name }}</h1>
        <form method="POST" action="{{ route('quiz.submit', $quiz->id) }}">
            @csrf
            <div class="space-y-6">
                @foreach($questions as $index => $question)
                    <div class="bg-gray-100 p-4 rounded-lg shadow">
                        <p class="font-medium text-lg text-gray-800 mb-3">
                            {{ $index + 1 }}. {{ $question->question }}
                        </p>
                        <div class="space-y-2">
                            <label class="block">
                                <input type="radio" name="answers[{{ $question->id }}]" value="a" required
                                       class="mr-2">
                                {{ $question->answer_a }}
                            </label>
                            <label class="block">
                                <input type="radio" name="answers[{{ $question->id }}]" value="b"
                                       class="mr-2">
                                {{ $question->answer_b }}
                            </label>
                            <label class="block">
                                <input type="radio" name="answers[{{ $question->id }}]" value="c"
                                       class="mr-2">
                                {{ $question->answer_c }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
            <button type="submit"
                    class="w-full mt-6 bg-blue-500 text-white font-bold py-3 rounded-lg shadow hover:bg-blue-600 transition duration-200">
                Submit Quiz
            </button>
        </form>
    </div>
</x-app-layout>
