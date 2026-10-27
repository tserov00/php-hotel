<h1>Платежи</h1>

<p><a href="{{ route('payments.create') }}">Создать платёж</a></p>

@if ($payments->isEmpty())
    <p>Платежей пока нет.</p>
@else
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ID бронирования</th>
                <th>Сумма</th>
                <th>Способ оплаты</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
                <tr>
                    <td><a href="{{ route('payments.show', $payment->id) }}">{{ $payment->id }}</a></td>
                    <td>{{ $payment->booking_id }}</td>
                    <td>{{ $payment->amount }}</td>
                    <td>{{ $payment->method->value }}</td>
                    <td>
                        <a href="{{ route('payments.edit', $payment->id) }}">Изменить</a>
                        <form method="POST" action="{{ route('payments.destroy', $payment->id) }}">
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
