<h1>Пользователи</h1>

<p><a href="{{ route('users.create') }}">Создать пользователя</a></p>

@if ($users->isEmpty())
    <p>Пользователей пока нет.</p>
@else
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Телефон</th>
                <th>Роль</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td><a href="{{ route('users.show', $user->id) }}">{{ $user->id }}</a></td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone ?? '—' }}</td>
                    <td>{{ $user->role->value }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}">Изменить</a>
                        <form method="POST" action="{{ route('users.destroy', $user->id) }}">
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
