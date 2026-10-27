<h1>Новый тип номера</h1>

<form method="POST" action="{{ route('roomTypes.store') }}">
    @csrf

    <label>
        Название
        <input
            type="text"
            name="name"
            value="{{ old('name') }}"
            required
        >
    </label>

    <label>
        Описание
        <textarea name="description">{{ old('description') }}</textarea>
    </label>

    <label>
        Вместимость
        <input
            type="number"
            name="capacity"
            value="{{ old('capacity') }}"
            min="1"
            required
        >
    </label>

    <label>
        Цена за ночь
        <input
            type="number"
            name="price_per_night"
            value="{{ old('price_per_night') }}"
            step="0.01"
            min="0"
            required
        >
    </label>

    <button type="submit">Сохранить</button>
</form>

<p><a href="{{ route('roomTypes.index') }}">К списку типов комнат</a></p>
