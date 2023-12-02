<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css" />
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
    @if(session('store_subject'))
    <span>{{session('store_subject')}}</span>
    @endif
    @if(session('update_subject'))
    <span>{{session('update_subject')}}</span>
    @endif
    <h1>Subjects</h1>
    <a href="/subjects/create/">Add Subjects</a>
    <table>
        <thead>
            <tr>
                <th>Subject</th>
                <th>Room</th>
                <th> </th>
                <th> </th>
            </tr>
        </thead>
        <tbody>
            @foreach($subjects as $subj)
            <tr>
                <td>{{$subj->sub_title}}</td>
                <td>{{$subj->sub_room}}</td>
                <td><a href="/subjects/{{$subj->id}}/edit/">Update</a><br>
                    <form action="{{ route('subjects.destroy',$subj->id )}}" method="post">
                        @csrf
                        @method('delete')
                        <td><button class="btn delete-btn" type="submit">Delete</button></td>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>