<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css" />
    <title>Register</title>
</head>
<body>  
    <div class="register">
        <p>this is my register page</p>
        <form action="/api/register" method="post">
            <!-- @csrf -->
            {{ csrf_field() }}
            <input placeholder="email" type="email" name="email" >
            <input placeholder="fullname" name="name">
            <input placeholder="username" name="username">
            <input placeholder="password" type="password" name="password" >
            <button>login</button>
            <p>Already Registered? <a href="/login">Login</a></p>
        </form>
    </div>
    
</body>
</html>