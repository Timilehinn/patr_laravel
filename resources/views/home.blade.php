<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css" />
    <title>API info</title>
</head>
<body>
    <div>
       <ul>
        <h2>Protected routes</h2>
        <li>Get User https://pat-asses.herokuapp.com/api/user/email@test.com  --( GET method accepts the email as a parameter to retrieve user details )</li>
        <li>Update User https://pat-asses.herokuapp.com/api/update-user  --( POST accepts {email,name,username,password} details cannot be null )</li>
        <li>Delete User https://pat-asses.herokuapp.com/api/delete/email@test.com --( DELETE accepts the email as a parameter )</li>
        <br>
        <br>
        <h2>UnProtected routes</h2>
        <li>Login User https://pat-asses.herokuapp.com/api/register  --( POST accepts {email,name,username,password} details cannot be null )</li>
        <li>Regsiter User https://pat-asses.herokuapp.com/api/login  --( POST accepts {email,password} details cannot be null, a token is generated for validation on protected routes )</li>
       <p>Note: All protected routes need a token for access e.g, {headers:{"Authorization":"Bearer + <i>token</i>, e.g(Bearer 3|skdjnfiurevs9egherugh394vuvdfb)"}}</p>
       </ul>
    </div>
    
</body>
</html>