<h1>Новый пользователь</h1>

<form method="POST" action="{{ route('users.store') }}">
    @csrf

    <label>
        Имя
        <input
            type="text"
            name="name"
            value="{{ old('name') }}"
            required
        >
    </label>

    <label>
        Email
        <input
            type="email"
            name="email"
            value="{{ old('email') }}"
            required
        >
    </label>

    <label>
        Пароль
        <input
            type="password"
            name="password"
            required
        >
    </label>

    <label>
        Телефон
        <input
            type="tel"
            name="phone"
            value="{{ old('phone') }}"
        >
    </label>

    <button type="submit">Сохранить</button>
</form>

<p><a href="{{ route('users.index') }}">К списку пользователей</a></p>
