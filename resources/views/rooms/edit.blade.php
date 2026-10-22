<h1>Редактировать номер</h1>

<form method="POST" action="{{ route('rooms.update', $room->id) }}">
    @csrf
    @method('PUT')

    <label>
        ID типа номера
        <input
            type="number"
            name="room_type_id"
            value="{{ old('room_type_id', $room->room_type_id) }}"
            min="1"
            required
        >
    </label>

    <label>
        Номер комнаты
        <input
            type="text"
            name="number"
            value="{{ old('number', $room->number) }}"
            required
        >
    </label>

    <label>
        Этаж
        <input
            type="number"
            name="floor"
            value="{{ old('floor', $room->floor) }}"
            required
        >
    </label>

    <button type="submit">Сохранить изменения</button>
</form>
