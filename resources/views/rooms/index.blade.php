<h1>Комнаты</h1>

<p><a href="{{ route('rooms.create') }}">Создать комнату</a></p>

@if ($rooms->isEmpty())
    <p>Комнат пока нет.</p>
@else
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Номер</th>
                <th>Тип комнаты</th>
                <th>Этаж</th>
                <th>Статус</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
                <tr>
                    <td><a href="{{ route('rooms.show', $room->id) }}">{{ $room->id }}</a></td>
                    <td>{{ $room->number }}</td>
                    <td>{{ $room->roomType?->name ?? '—' }}</td>
                    <td>{{ $room->floor }}</td>
                    <td>{{ $room->status?->label() ?? '—' }}</td>
                    <td>
                        <a href="{{ route('rooms.edit', $room->id) }}">Изменить</a>
                        <form method="POST" action="{{ route('rooms.destroy', $room->id) }}">
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
