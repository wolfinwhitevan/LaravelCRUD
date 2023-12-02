<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel CRUD</title>
</head>

<style>
    body {
        font-family: 'HelveticaNeue', sans-serif;
        background-color: #141414;
        margin-top: 80px;
        margin-left: 400px;
        margin-right: 400px;
    }

    h1 {
        color: #e0e0e0;
    }

    a {
        text-decoration: none;
        color: #3498db;
        transition: color 0.1s ease;
    }

    a:hover {
        color: #4CAF50;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    td {
        border: 1px solid #e0e0e0;
        padding: 12px;
        text-align: left;
        color: #e0e0e0;
    }

    th {
        background-color: #e0e0e0;
        color: #141414;
        border: 1px solid #141414;
        padding: 12px;
        text-align: left;
    }

    tbody tr:nth-child(even) {
        background-color: #141414;
    }

    span {
        display: block;
        margin-top: 10px;
        color: #e0e0e0;
    }

    .btn-danger {
        background-color: #e74c3c;
        color: #fff;
        border: none;
        padding: 8px 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-top: 5px;
    }

    .btn.danger:hover {
        background-color: #c0392b;
    }
</style>

<body>
    <h1>Users</h1>
    <a href="/users/create/">Add User</a>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Date Created</th>
                <th>Date Updated</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->updated_at}}</td>
                <td><a href="/user_subjects/{{$user->id}}">View Subjects</a><br>
                    <a href="/users/{{$user->id}}/edit/">Update</a><br>
                    <form action="{{ route('users.destroy',$user->id )}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>