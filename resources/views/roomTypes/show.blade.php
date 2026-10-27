<h1>Тип комнаты #{{ $roomType->id }}</h1>

<dl>
    <dt>Название</dt>
    <dd>{{ $roomType->name }}</dd>

    <dt>Описание</dt>
    <dd>{{ $roomType->description ?? '—' }}</dd>

    <dt>Вместимость</dt>
    <dd>{{ $roomType->capacity }}</dd>

    <dt>Цена за ночь</dt>
    <dd>{{ $roomType->price_per_night }}</dd>
</dl>

<p>
    <a href="{{ route('roomTypes.index') }}">К списку типов комнат</a>
    <a href="{{ route('roomTypes.edit', $roomType->id) }}">Редактировать</a>
</p>

<form method="POST" action="{{ route('roomTypes.destroy', $roomType->id) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Удалить тип комнаты</button>
</form>
