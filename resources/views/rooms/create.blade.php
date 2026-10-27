<h1>Новый номер</h1>

<form method="POST" action="{{ route('rooms.store') }}">
    @csrf

    <label>
        ID типа номера
        <input
            type="number"
            name="room_type_id"
            value="{{ old('room_type_id') }}"
            min="1"
            required
        >
    </label>

    <label>
        Номер комнаты
        <input
            type="number"
            name="number"
            value="{{ old('number') }}"
            min="1"
            step="1"
            required
        >
    </label>

    <label>
        Этаж
        <input
            type="number"
            name="floor"
            value="{{ old('floor') }}"
            required
        >
    </label>

    <button type="submit">Сохранить</button>
</form>

<p><a href="{{ route('rooms.index') }}">К списку комнат</a></p>
