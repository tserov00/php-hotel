<h1>Бронирование #{{ $booking->id }}</h1>

<dl>
    <dt>ID пользователя</dt>
    <dd>{{ $booking->user_id }}</dd>

    <dt>ID комнаты</dt>
    <dd>{{ $booking->room_id }}</dd>

    <dt>Дата заезда</dt>
    <dd>{{ $booking->check_in }}</dd>

    <dt>Дата выезда</dt>
    <dd>{{ $booking->check_out }}</dd>

    <dt>Количество гостей</dt>
    <dd>{{ $booking->guests_count }}</dd>

    <dt>Итоговая цена</dt>
    <dd>{{ $booking->total_price }}</dd>

    <dt>Статус</dt>
    <dd>{{ $booking->status instanceof \App\Enums\BookingStatus ? $booking->status->value : $booking->status }}</dd>

    <dt>Комментарий</dt>
    <dd>{{ $booking->comment ?? '—' }}</dd>
</dl>

<p>
    <a href="{{ route('bookings.index') }}">К списку бронирований</a>
</p>

<form method="GET" action="{{ route('bookings.edit', $booking->id) }}">
    <button type="submit">Редактировать бронирование</button>
</form>

<form method="POST" action="{{ route('bookings.destroy', $booking->id) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Удалить бронирование</button>
</form>
