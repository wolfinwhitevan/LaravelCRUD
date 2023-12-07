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
          <td>@foreach($user_sub->subjects as $subs)
            <hr>{{$subs->sub_title}}</hr>
              <form action="{{ route('user_subjects.destroy', ['user_id' => $user_sub->id, 'subject_id' => $subs->id]) }}" method="post" style="display: inline;">
                @csrf
                @method('DELETE')
                <button class="btn delete-btn" type="submit">DELETE</button>
              </form>
            @endforeach
            <tr><a href="/user_subjects/add/{{$user_sub->id}}">ADD</a></tr><br><br>
          </td>
      </tr>
      @endforeach
    </tbody>
	</table>

  <br><br>
  <a href="/users/">USERS</a><br><br>
  <a href="/subjects/">SUBJECTS</a>

</body>
</html>