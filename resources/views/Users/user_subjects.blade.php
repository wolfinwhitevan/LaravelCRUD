<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel CRUD</title>
</head>

<body>
    <h1>User Subjects</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Subjects</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user_subjects as $user_sub)
            <tr>
                <td>{{$user_sub->name}}</td>
                <td>
                    @foreach($user_sub->subjects as $subs)
                    {{$subs->sub_title}}
                    <hr>
                    @endforeach
                    <a href="/user_subjects/add/{{$user_sub->id}}">Add</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>