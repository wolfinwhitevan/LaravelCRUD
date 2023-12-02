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

    .delete-btn {
        background-color: #e74c3c;
        color: #fff;
        border: none;
        padding: 8px 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .delete-btn:hover {
        background-color: #c0392b;
    }
</style>

<body>
    <h1>ADD User</h1>
    <form method="post" action="{{route('users.update',$user->id)}}">
        @csrf
        @method('put')
        <input type="hidden" name="id" value="{{$user->id}}">
        <input type="text" name="name" placeholder="Full Name" value="{{old('name',$user->name)}}">
        @error('name')
        <span style="color:red">*required</span>
        @enderror
        <br>
        <input type="text" name="email" placeholder="Email" value="{{old('email',$user->email)}}">
        @error('email')
        <span style="color:red">{{$message}}</span>
        @enderror
        <br>
        <input type="submit" value="EDIT">
    </form>
</body>
</html>