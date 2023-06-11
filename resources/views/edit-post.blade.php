<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Post</title>

    <style>
        .outer-frame {
            width: 50%;
            margin: 0 auto;
            border: 1px gray solid;
            padding: 2rem;
            border-radius: 1rem;
            background-color: lightgray;
        }
        .styled-form-field {
            display: block;
            margin: 1rem auto;
            padding: 0.5rem;
            border-radius: 0.5rem;
            border: 1px gray solid;
        }
        .styled-button-primary {
            display: block;
            margin: 1rem auto;
            padding: 0.5rem;
            border-radius: 0.5rem;
            border: 1px gray solid;
            background-color: lightblue;
        }
    </style>
</head>
<body>
    <h1>Edit Post</h1>
    <div class="registration-box">
        <form action="/edit-post/{{$post->id}}" method="POST" style="text-align: center">
            @csrf
            @method('PUT')
            <input class="registration-form-field" type="text" name="title" value="{{$post->title}}">
            <textarea name="body" cols="30" rows="10" placeholder="Body content...">{{$post->body}}</textarea>
            <button class="registration-submit-button" type="submit">Save Changes</button>
        </form>
    </div>

</body>
</html>