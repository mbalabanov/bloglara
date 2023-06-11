<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>   

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        .container {
            display: flex;
        }
        .styled-column {
            border: 1px lightskyblue solid;
            padding: 2rem;
            border-radius: 1rem;
            background-color: lightblue;
            margin: 1rem;
            flex: 1;
        }
        .styled-form-field {
            display: block;
            margin: 1rem auto;
            padding: 0.5rem;
            border-radius: 0.5rem;
            border: 1px lightslategray solid;
        }
        .styled-button-primary {
            display: block;
            margin: 1rem auto;
            padding: 0.5rem;
            border-radius: 0.5rem;
            border: none;
            background-color: rgb( 13, 110, 253);
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>

    @auth
    <h1 style="text-align: center">Logged in as User</h1>
    <form action="/logout" method="POST" style="text-align: center">
        @csrf
        <button class="styled-button-primary" type="submit">Logout</button>
    </form>    


    <h1 style="text-align: center">Create New Post</h1>
    <div class="styled-column">
        <form action="/create-post" method="POST" style="text-align: center">
            @csrf
            <input class="styled-form-field" type="text" name="title" placeholder="Title">
            <textarea name="body" cols="30" rows="10" placeholder="Body content..."></textarea>
            <button class="styled-button-primary" type="submit">Save Post</button>
        </form>
    </div>

    <h1 style="text-align: center">Posts</h1>
    <div class="styled-column">
        @foreach ($posts as $post)
            <h3>{{ $post->title }}</h3>
            <h4>by {{ $post->user->name }}</h5>
            <p>{{ $post->body }}</p>
            <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
            <form action="/delete-post/{{$post->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="styled-button-primary" type="submit">Delete</button>
            </form>
            <hr>
        @endforeach
    </div>

    @else

    <div class="container">
        <div class="styled-column">
            <h1 style="text-align: center">Registration</h1>
            <form action="/register" method="POST" style="text-align: center">
                @csrf
                <input class="styled-form-field" type="text" name="name" placeholder="Name">
                <input class="styled-form-field" type="text" name="email" placeholder="Email">
                <input class="styled-form-field" type="password" name="password" placeholder="Password">
                <button class="styled-button-primary" type="submit">Register</button>
            </form>
        </div>

        <div class="styled-column">
            <h1 style="text-align: center">Login</h1>
            <form action="/login" method="POST" style="text-align: center">
                @csrf
                <input class="styled-form-field" type="text" name="loginemail" placeholder="Email">
                <input class="styled-form-field" type="password" name="loginpassword" placeholder="Password">
                <button class="styled-button-primary" type="submit">Login</button>
            </form>
        </div>
    </div>

    @endauth  

</body>
</html>