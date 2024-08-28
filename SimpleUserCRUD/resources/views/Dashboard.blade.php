<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
      
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

      
        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
        }

        .Post-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .logout-button {
            background-color: red;
            color: #fff;
            border: none;
            padding: 10px 20px;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .Post-button:hover {
            background-color: #0056b3; 
        }

        .logout-button:hover {
            background-color: darkred;
        }

        
        main {
            padding: 20px;
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .content-box {
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .content-box h2 {
            margin-top: 0;
            font-size: 24px;
            color: #333;
        }

        .post-item {
            background-color: #fff;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .post-item h3 {
            margin-top: 0;
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }

        .post-item p {
            color: #666;
            margin-bottom: 10px;
        }

        .post-links {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .edit-link {
            color: #007bff;
            text-decoration: none;
            margin-left: 10px;
            padding: 5px 10px;
            border: 1px solid #007bff;
            border-radius: 4px;
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
            cursor: pointer;
            
        }
        .button-delete{
            color: #007bff;
            text-decoration: none;
            margin-left: 10px;
            padding: 5px 10px;
            border: 1px solid #007bff;
            border-radius: 4px;
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
            cursor: pointer;
            background-color: white;
        }

        .edit-link:hover, .button-delete:hover {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }
    </style>
</head>
<body>
    
    <header>
        <h1>Welcome, {{ Auth::user()->name }}</h1>
        <div>
            <form action="/logout" method="post">
                @csrf
                <button class="logout-button">Log out</button>
            </form>
        </div>
        <div>
            <form action="/Post-Page" method="get">
                @csrf
                <button class="Post-button">New Post</button>
            </form>
        </div>
    </header>

    <main>
        <div class="content-box">
            <h2>All Posts</h2>
            @forelse ($posts as $post)
                <div class="post-item">
                    <h3>{{ $post->title }}, by {{ $post->user->name }}</h3>
                    <p>{{ $post->body }}</p>
                    @if ($post->user_id == auth()->user()->id)
                    <div class="post-links">
                        <a href="/edit-post/{{$post->id}}" class="edit-link">Edit</a>
                        <form action="/delete-post/{{$post->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button-delete">Delete</button>
                        </form>
                    </div>
                    @endif
                </div>
            @empty
                <p>No posts found.</p>
            @endforelse
        </div>
    </main>

</body>
</html>
