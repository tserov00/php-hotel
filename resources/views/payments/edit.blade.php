<h1>Редактировать платёж</h1>

<form method="POST" action="{{ route('payments.update', $payment->id) }}">
    @method('PUT')

    <label>
        ID бронирования
        <input
            type="number"
            name="booking_id"
            value="{{ old('booking_id', $payment->booking_id) }}"
            required
        >
    </label>

    <label>
        Сумма
        <input
            type="number"
            name="amount"
            step="0.01"
            value="{{ old('amount', $payment->amount) }}"
            required
        >
    </label>

    <label>
        Способ оплаты
        <select name="method" required>
            <option value="card" @selected(old('method', $payment->method->value) === 'card')>
                Карта
            </option>
            <option value="cash" @selected(old('method', $payment->method->value) === 'cash')>
                Наличные
            </option>
        </select>
    </label>

    <button type="submit">Сохранить изменения</button>
</form>
