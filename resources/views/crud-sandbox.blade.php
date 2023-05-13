

<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
</head>
<body>
    <h1>Create User</h1>

    <form method="POST" action="/dev/simp">
        {{ csrf_field()}}
        {{ logger('test')}}

        <label for="name">Name:</label>
        <input type="text" name="name" id="name">

        <label for="email">Email:</label>
        <input type="email" name="email" id="email">

        <label for="password">Password:</label>
        <input type="password" name="password" id="password">

        <button type="submit">Create User</button>
    </form>

    <hr>

    <h1>Users</h1>

    <ul>
        {{-- @foreach ($users as $user)
            <li>{{ $user->name }} ({{ $user->email }})</li>
        @endforeach --}}
    </ul>
</body>
</html>