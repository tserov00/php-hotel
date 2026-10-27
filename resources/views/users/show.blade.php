<h1>Пользователь #{{ $user->id }}</h1>

<dl>
    <dt>Имя</dt>
    <dd>{{ $user->name }}</dd>

    <dt>Email</dt>
    <dd>{{ $user->email }}</dd>

    <dt>Телефон</dt>
    <dd>{{ $user->phone ?? '—' }}</dd>

    <dt>Роль</dt>
    <dd>{{ $user->role->value }}</dd>
</dl>

<p>
    <a href="{{ route('users.index') }}">К списку пользователей</a>
    <a href="{{ route('users.edit', $user->id) }}">Редактировать</a>
</p>

<form method="POST" action="{{ route('users.destroy', $user->id) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Удалить пользователя</button>
</form>
