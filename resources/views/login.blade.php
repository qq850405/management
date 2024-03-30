<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        /* 基础样式重置 */
        body, h5, form, input, button {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 20px;
            max-width: 400px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        .btn-default {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
            width: 100%;
        }
        h5 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
@include('layouts.header')
<div class="content inner-pg reservation-section">
    <div class="container">
        <div class="reservation-form">
            <form action="/login" method="POST">
                @csrf
                <h5>Login</h5>
                <div class="form-group">
                    <label>Email</label>
                    <input id="account" name="email" type="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="send-message text-center">
                    <button type="submit" class="btn btn-default">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
