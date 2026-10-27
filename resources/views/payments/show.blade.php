<h1>Платёж #{{ $payment->id }}</h1>

<dl>
    <dt>ID бронирования</dt>
    <dd>{{ $payment->booking_id }}</dd>

    <dt>Сумма</dt>
    <dd>{{ $payment->amount }}</dd>

    <dt>Способ оплаты</dt>
    <dd>{{ $payment->method->value }}</dd>
</dl>

<p>
    <a href="{{ route('payments.index') }}">К списку платежей</a>
    <a href="{{ route('payments.edit', $payment->id) }}">Редактировать</a>
</p>

<form method="POST" action="{{ route('payments.destroy', $payment->id) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Удалить платёж</button>
</form>
