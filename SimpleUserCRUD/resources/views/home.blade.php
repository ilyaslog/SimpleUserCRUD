<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register and Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 300px;
            margin-bottom: 20px; 
        }
        .form-group {
            margin-bottom: 10px;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-group input[type="text"],
        .form-group input[type="password"],
        .form-group input[type="email"] {
            width: calc(100% - 20px);
            padding: 8px;
            margin-top: 4px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group button {
            padding: 8px 16px;
            margin-top: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button[type="reset"] {
            background-color: #6c757d;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
        .form-group button[type="reset"]:hover {
            background-color: #5a6268;
        }
        .form-title {
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="/register" method="post" class="form-group">
            @csrf
            <div class="form-title">
                <h1>Register</h1>
            </div>
    
          
    
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Name" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
                <button type="reset">Reset</button>
            </div>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        </form>
    </div>
    
    
    <div class="container">
        <form action="/login" method="post" class="form-group">
            @csrf
            <div class="form-title">
                <h1>Login</h1>
            </div>
    
         
    
            <div class="form-group">
                <label for="nameLogin">Name:</label>
                <input type="text" id="nameLogin" name="nameLogin" placeholder="Name" required>
            </div>
            <div class="form-group">
                <label for="passwordLogin">Password:</label>
                <input type="password" id="passwordLogin" name="passwordLogin" placeholder="Password" required>
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
                <button type="reset">Reset</button>
                
            </div>
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </form>
    </div>
    
</body>
</html>
