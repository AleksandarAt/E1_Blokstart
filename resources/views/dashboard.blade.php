<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-bold mb-4">Welkom bij de quiz-app 🎉</h3>
                    <p class="mb-6">Klik hieronder om te starten met een quiz:</p>

                    <!-- Quiz start knop -->
                    <a href="{{ route('quiz.start') }}"
                       class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        ➡️ Start de quiz
                    </a>

                    <!-- Docent knop (optioneel) -->
                    <a href="{{ route('questions.index') }}"
                       class="inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-2">
                        📝 Vragen beheren
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
