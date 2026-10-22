<h1>Редактировать тип номера</h1>

<form method="POST" action="{{ route('roomTypes.update', $roomType->id) }}">
    @csrf
    @method('PUT')

    <label>
        Название
        <input
            type="text"
            name="name"
            value="{{ old('name', $roomType->name) }}"
            required
        >
    </label>

    <label>
        Описание
        <textarea name="description">{{ old('description', $roomType->description) }}</textarea>
    </label>

    <label>
        Вместимость
        <input
            type="number"
            name="capacity"
            value="{{ old('capacity', $roomType->capacity) }}"
            min="1"
            required
        >
    </label>

    <label>
        Цена за ночь
        <input
            type="number"
            name="price_per_night"
            value="{{ old('price_per_night', $roomType->price_per_night) }}"
            step="0.01"
            min="0"
            required
        >
    </label>

    <button type="submit">Сохранить изменения</button>
</form>
