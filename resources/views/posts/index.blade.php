<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>All Posts</title>
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

    .table {
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    .btn-container {
        margin-top: 20px;
        text-align: center;
    }

    .btn-primary {
        background-color: #4CAF50;
        border-color: #4CAF50;
    }

    .btn-secondary {
        background-color: #333;
        border-color: #333;
    }

    .btn-danger {
        background-color: #F44336;
        border-color: #F44336;
    }

    .btn-container button {
        margin: 0 5px;
    }
</style>
</head>
<body>
<div class="container">
    <h1>All Posts</h1>
    @if (session('success'))
     <div class="alert alert-success">
     {{ session('success') }}
     </div>
    @endif
    <table class="table">
     <thead>
     <tr>
     <th>Title</th>
     <th>Content</th>
     <th>Actions</th>
     </tr>
     </thead>
     <tbody>
     @foreach ($posts as $post)
     <tr>
     <td>{{ $post->title }}</td>
     <td>{{ $post->content }}</td>
     <td>
     <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">View</a>
     <a href="{{ route('posts.edit', $post) }}" class="btn btn-secondary">Edit</a>
     <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline-block">
     @csrf
     @method('DELETE')
     <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
     </form>
     </td>
     </tr>
     @endforeach
     </tbody>
    </table>
    {{ $posts->links() }}
    <div class="btn-container">

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createModalLabel">Create New Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('posts.store')
