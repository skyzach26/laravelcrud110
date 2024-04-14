<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $post->title }}</title>
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    /* Internal CSS */
    .container {
        max-width: 960px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
    }

    .btn-container {
        margin-top: 20px;
        text-align: center;

    }

    .btn-secondary {
        background-color: #333;
        border-color: #333;
    }

    .btn-danger {
        background-color: #F44336;
        border-color: #F44336;
    }

    .btn-primary {
        background-color: #4CAF50;
        border-color: #4CAF50;
    }
</style>
</head>
<body>
<div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <div class="btn-container">
        <a href="{{ route('posts.edit', $post) }}" class="btn btn-secondary">Edit</a>
        <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
        <a href="{{ route('posts.index') }}" class="btn btn-primary">Back to all posts</a>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Create new post</a>
    </div>
</div>
<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
