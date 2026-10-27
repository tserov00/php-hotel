<h1>Комната #{{ $room->id }}</h1>

<dl>
    <dt>Номер</dt>
    <dd>{{ $room->number }}</dd>

    <dt>Тип комнаты</dt>
    <dd>{{ $room->roomType?->name ?? '—' }}</dd>

    <dt>ID типа комнаты</dt>
    <dd>{{ $room->room_type_id }}</dd>

    <dt>Этаж</dt>
    <dd>{{ $room->floor }}</dd>

    <dt>Статус</dt>
    <dd>{{ $room->status?->label() ?? '—' }}</dd>
</dl>

<p>
    <a href="{{ route('rooms.index') }}">К списку комнат</a>
    <a href="{{ route('rooms.edit', $room->id) }}">Редактировать</a>
</p>

<form method="POST" action="{{ route('rooms.destroy', $room->id) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Удалить комнату</button>
</form>
