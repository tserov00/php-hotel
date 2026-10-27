<h1>Редактировать пользователя</h1>

<form method="POST" action="{{ route('users.update', $user->id) }}">
    @csrf
    @method('PUT')

    <label>
        Имя
        <input
            type="text"
            name="name"
            value="{{ old('name', $user->name) }}"
            required
        >
    </label>

    <label>
        Email
        <input
            type="email"
            name="email"
            value="{{ old('email', $user->email) }}"
            required
        >
    </label>

    <label>
        Телефон
        <input
            type="tel"
            name="phone"
            value="{{ old('phone', $user->phone) }}"
        >
    </label>

    <button type="submit">Сохранить изменения</button>
</form>

<p><a href="{{ route('users.show', $user->id) }}">К пользователю</a></p>
