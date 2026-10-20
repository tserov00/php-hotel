<h1>Новый платёж</h1>

<form method="POST" action="{{ route('payments.store') }}">

    <label>
        ID бронирования
        <input
            type="number"
            name="booking_id"
            value="{{ old('booking_id') }}"
            required
        >
    </label>

    <label>
        Сумма
        <input
            type="number"
            name="amount"
            step="0.01"
            value="{{ old('amount') }}"
            required
        >
    </label>

    <label>
        Способ оплаты
        <select name="method" required>
            <option value="card">Карта</option>
            <option value="cash">Наличные</option>
        </select>
    </label>

    <button type="submit">Сохранить</button>
</form>
