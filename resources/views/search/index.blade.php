<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-indigo-600">Hotel</p>
            <h1 class="mt-1 text-2xl font-semibold text-gray-900 dark:text-white">Поиск комнат</h1>
        </div>
    </x-slot>

    <main class="px-4 py-10 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-5xl">
            <section class="overflow-hidden rounded-3xl bg-white shadow-xl ring-1 ring-gray-200 dark:bg-gray-800 dark:ring-gray-700">
                <div>
                    <div class="bg-indigo-700 px-8 py-10 text-white sm:px-10">
                        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-indigo-200">Ваше пребывание</p>
                        <h2 class="mt-4 text-3xl font-semibold leading-tight sm:text-4xl">Найдите комнату для поездки</h2>
                        <p class="mt-4 max-w-md text-indigo-100">
                            Укажите даты и количество гостей — мы покажем типы комнат, доступные на эти даты.
                        </p>
                    </div>

                    <div class="p-6 sm:p-10">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Параметры поездки</h2>

                        @if ($errors->any())
                            <div class="mt-5 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700" role="alert">
                                <p class="font-semibold">Проверьте введённые данные:</p>
                                <ul class="mt-2 list-inside list-disc space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="GET" action="{{ route('search.results') }}" class="mt-6 grid gap-5 md:grid-cols-4 md:items-end">
                            <div>
                                <label for="check_in" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Дата заезда</label>
                                <input
                                    id="check_in"
                                    name="check_in"
                                    type="date"
                                    min="{{ now()->toDateString() }}"
                                    value="{{ old('check_in', $checkIn) }}"
                                    required
                                    class="mt-2 block w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                                >
                            </div>

                            <div>
                                <label for="check_out" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Дата выезда</label>
                                <input
                                    id="check_out"
                                    name="check_out"
                                    type="date"
                                    min="{{ now()->addDay()->toDateString() }}"
                                    value="{{ old('check_out', $checkOut) }}"
                                    required
                                    class="mt-2 block w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                                >
                            </div>

                            <div>
                                <label for="guests" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Количество гостей</label>
                                <input
                                    id="guests"
                                    name="guests"
                                    type="number"
                                    min="1"
                                    value="{{ old('guests', $guests) }}"
                                    required
                                    class="mt-2 block w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                                >
                            </div>

                            <button
                                type="submit"
                                class="inline-flex w-full items-center justify-center rounded-xl bg-indigo-600 px-6 py-3 text-base font-semibold text-white shadow-sm transition hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            >
                                Найти комнаты
                            </button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </main>
</x-app-layout>
