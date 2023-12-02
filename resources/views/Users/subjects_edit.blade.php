<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laravel Crud</title>
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

    .container-edit {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .title-edit {
      color: #333;
      text-align: center;
    }

    .form-container {
      width: 300px;
      margin: 20px auto;
    }

    .edit-field {
      width: 100%;
      padding: 10px;
      margin-top: 8px;
      margin-bottom: 16px;
      border: 1px solid #ddd;
      border-radius: 4px;
      box-sizing: border-box;
    }

    .edit-sub-btn {
      background-color: #3498db;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .edit-sub-btn:hover {
      background-color: #2077b3;
    }

    span {
      color: red;
      margin-top: 8px;
      display: block;
    }

  </style>
</head>

<body>
  <div class="container-edit">
    <h1 class="title-edit">Edit Subjects</h1>
    <form method="post" action="/subjects/update" class="form-container">

      <div>
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$subject->id}}">
        <input class="edit-field" type="text" name="sub_title" placeholder="Subject Title" value="{{old('sub_title', $subject->sub_title)}}">
        @error('sub_title')
        <span style="color: red;">*required</span>
        @enderror
        <br>
        <input class="edit-field" type="text" name="sub_room" placeholder="Subject Room" value="{{old('sub_room', $subject->sub_room)}}">
        @error('sub_room')
        <span style="color: red;">{{$message}}</span>
        @enderror
        <br>
        <input class="edit-sub-btn" type="submit" value="UPDATE">
      </div>

    </form>
  </div>

</body>

</html>