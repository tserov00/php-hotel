<h1>Бронирования</h1>

<p>
    <a href="{{ route('bookings.create') }}">Создать бронирование</a>
</p>

@if ($bookings->isEmpty())
    <p>Бронирований пока нет.</p>
@else
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ID пользователя</th>
                <th>ID комнаты</th>
                <th>Заезд</th>
                <th>Выезд</th>
                <th>Гостей</th>
                <th>Цена</th>
                <th>Статус</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>
                        <a href="{{ route('bookings.show', $booking->id) }}">
                            {{ $booking->id }}
                        </a>
                    </td>
                    <td>{{ $booking->user_id }}</td>
                    <td>{{ $booking->room_id }}</td>
                    <td>{{ $booking->check_in }}</td>
                    <td>{{ $booking->check_out }}</td>
                    <td>{{ $booking->guests_count }}</td>
                    <td>{{ $booking->total_price }}</td>
                    <td>{{ $booking->status instanceof \App\Enums\BookingStatus ? $booking->status->value : $booking->status }}</td>
                    <td>
                        <form method="GET" action="{{ route('bookings.edit', $booking->id) }}">
                            <button type="submit">Редактировать</button>
                        </form>
                        <form method="POST" action="{{ route('bookings.destroy', $booking->id) }}">
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
