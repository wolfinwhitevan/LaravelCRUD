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
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .container-add {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #141414;
        text-align: center;
    }

    form {
        width: 300px;
        margin: 20px auto;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-top: 8px;
        margin-bottom: 16px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #3498db;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #2077b3;
    }

    span {
        color: red;
        margin-top: 8px;
        display: block;
    }
</style>

<body>
    <div class="container-add">
        <h1>ADD User</h1>
        <form method="post" action="/users">
            @csrf
            <input type="text" name="name" placeholder="Full Name" value="{{old('name')}}">
            @error('name')
            <span style="color:red">*required</span>
            @enderror
            <br>
            <input type="text" name="email" placeholder="Email" value="{{old('email')}}">
            @error('email')
            <span style="color:red">{{$message}}</span>
            @enderror
            <br>
            <input type="submit" value="ADD">
        </form>
    </div>
</body>

</html>