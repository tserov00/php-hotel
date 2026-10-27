<h1>Типы комнат</h1>

<p><a href="{{ route('roomTypes.create') }}">Создать тип комнаты</a></p>

@if ($roomTypes->isEmpty())
    <p>Типов комнат пока нет.</p>
@else
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Вместимость</th>
                <th>Цена за ночь</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roomTypes as $roomType)
                <tr>
                    <td><a href="{{ route('roomTypes.show', $roomType->id) }}">{{ $roomType->id }}</a></td>
                    <td>{{ $roomType->name }}</td>
                    <td>{{ $roomType->capacity }}</td>
                    <td>{{ $roomType->price_per_night }}</td>
                    <td>
                        <a href="{{ route('roomTypes.edit', $roomType->id) }}">Изменить</a>
                        <form method="POST" action="{{ route('roomTypes.destroy', $roomType->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
