<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css" />
    <title>Login</title>
</head>
<body>
    <div class="login">
        {{ session('msg') }}
        <p>this is my login page</p>
        <form action ="/api/login" method="post">
        @cfrs
        
            <input placeholder="email" name="email" >
            <input placeholder="password" name="password" >
            <button>login</button>
            <p>No Account? <a href="/register">Register</a></p>
        </form>
    </div>
    
</body>
</html>