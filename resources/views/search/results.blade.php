<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-indigo-600">Hotel</p>
                <h1 class="mt-1 text-2xl font-semibold text-gray-900 dark:text-white">Доступные типы комнат</h1>
            </div>
            <a
                href="{{ route('search.index', ['check_in' => $checkIn->toDateString(), 'check_out' => $checkOut->toDateString(), 'guests' => $guests]) }}"
                class="inline-flex items-center justify-center rounded-xl border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700"
            >
                Изменить поиск
            </a>
        </div>
    </x-slot>

    <main class="px-4 py-10 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <section class="mb-8 rounded-2xl bg-white p-5 shadow-sm ring-1 ring-gray-200 dark:bg-gray-800 dark:ring-gray-700 sm:p-6">
                <div class="flex flex-wrap gap-x-8 gap-y-4 text-sm">
                    <div>
                        <p class="text-gray-500 dark:text-gray-400">Заезд</p>
                        <p class="mt-1 font-semibold text-gray-900 dark:text-white">{{ $checkIn->format('d.m.Y') }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 dark:text-gray-400">Выезд</p>
                        <p class="mt-1 font-semibold text-gray-900 dark:text-white">{{ $checkOut->format('d.m.Y') }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 dark:text-gray-400">Гостей</p>
                        <p class="mt-1 font-semibold text-gray-900 dark:text-white">{{ $guests }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 dark:text-gray-400">Ночей</p>
                        <p class="mt-1 font-semibold text-gray-900 dark:text-white">{{ $nights }}</p>
                    </div>
                </div>
            </section>

            @if ($roomTypes->isEmpty())
                <section class="rounded-2xl bg-white px-6 py-14 text-center shadow-sm ring-1 ring-gray-200 dark:bg-gray-800 dark:ring-gray-700">
                    <div class="mx-auto flex size-14 items-center justify-center rounded-full bg-indigo-50 text-indigo-600 dark:bg-indigo-950 dark:text-indigo-300">
                        <svg class="size-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 10.5 12 3l9 7.5M5.25 9v11.25h13.5V9M9 20.25v-6h6v6" />
                        </svg>
                    </div>
                    <h2 class="mt-5 text-xl font-semibold text-gray-900 dark:text-white">Подходящих комнат не найдено</h2>
                    <p class="mx-auto mt-2 max-w-lg text-sm text-gray-600 dark:text-gray-300">
                        Попробуйте изменить даты поездки или количество гостей.
                    </p>
                    <a
                        href="{{ route('search.index', ['check_in' => $checkIn->toDateString(), 'check_out' => $checkOut->toDateString(), 'guests' => $guests]) }}"
                        class="mt-6 inline-flex items-center justify-center rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-indigo-500"
                    >
                        Изменить параметры
                    </a>
                </section>
            @else
                <div class="mb-5 flex items-end justify-between gap-4">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Найдено вариантов: {{ $roomTypes->count() }}</h2>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">Цена указана за одну ночь.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($roomTypes as $roomType)
                        <article class="overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-gray-200 dark:bg-gray-800 dark:ring-gray-700">
                            @if (filled($roomType->photo_path))
                                <img
                                    src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($roomType->photo_path) }}"
                                    alt="{{ $roomType->name }}"
                                    class="h-56 w-full object-cover"
                                >
                            @else
                                <div class="flex h-56 items-center justify-center bg-gray-100 text-gray-400 dark:bg-gray-700 dark:text-gray-500">
                                    <svg class="size-14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10.5 12 3l9 7.5M5.25 9v11.25h13.5V9M9 20.25v-6h6v6" />
                                    </svg>
                                </div>
                            @endif

                            <div class="p-6">
                                <div class="flex items-start justify-between gap-4">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $roomType->name }}</h3>
                                    <span class="shrink-0 rounded-full bg-green-50 px-3 py-1 text-xs font-semibold text-green-700 dark:bg-green-900/30 dark:text-green-300">Доступен</span>
                                </div>

                                @if ($roomType->description)
                                    <p class="mt-3 text-sm leading-6 text-gray-600 dark:text-gray-300">{{ $roomType->description }}</p>
                                @endif

                                <dl class="mt-5 grid grid-cols-2 gap-4 border-t border-gray-100 pt-5 dark:border-gray-700">
                                    <div>
                                        <dt class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">Вместимость</dt>
                                        <dd class="mt-1 font-medium text-gray-900 dark:text-white">До {{ $roomType->capacity }} гостей</dd>
                                    </div>
                                    <div>
                                        <dt class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">Площадь</dt>
                                        <dd class="mt-1 font-medium text-gray-900 dark:text-white">{{ $roomType->area }} м²</dd>
                                    </div>
                                </dl>

                                <div class="mt-5 flex flex-wrap items-end justify-between gap-4 border-t border-gray-100 pt-5 dark:border-gray-700">
                                    <div>
                                        <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">Цена за ночь</p>
                                        <p class="mt-1 text-2xl font-semibold text-gray-900 dark:text-white">{{ number_format((float) $roomType->price_per_night, 2, ',', ' ') }}</p>
                                    </div>
                                    <button
                                        type="button"
                                        class="whitespace-nowrap rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                    >
                                        Забронировать
                                    </button>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </div>
    </main>
</x-app-layout>
