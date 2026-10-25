<h1>Новое бронирование</h1>

<form method="POST" action="{{ route('bookings.store') }}">
    @csrf

    <label>
        ID пользователя
        <input
            type="number"
            name="user_id"
            value="{{ old('user_id') }}"
            required
        >
    </label>

    <label>
        ID комнаты
        <input
            type="number"
            name="room_id"
            value="{{ old('room_id') }}"
            required
        >
    </label>

    <label>
        Дата заезда
        <input
            type="date"
            name="check_in"
            value="{{ old('check_in') }}"
            required
        >
    </label>

    <label>
        Дата выезда
        <input
            type="date"
            name="check_out"
            value="{{ old('check_out') }}"
            required
        >
    </label>

    <label>
        Количество гостей
        <input
            type="number"
            name="guests_count"
            value="{{ old('guests_count') }}"
            min="1"
            required
        >
    </label>

    <label>
        Комментарий
        <textarea name="comment">{{ old('comment') }}</textarea>
    </label>

    <button type="submit">Сохранить</button>
</form>
