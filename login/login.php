
<html>
    <head>
        <link href="register.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="header"><p>Login</p></div>
        <form method="POST" action="login.php">
            <div class="input_group">
                <label>Username</label>
                <input name="username" type="text">
            </div>
            <div class="input_group">
                <label>Password</label>
                <input name="password_1" type="text">
            </div>
            <div class="input_group">
                <button class="button" name="register" type="submit">Login</button>
            </div>
            <p>Not a member?<a href="register.php">Sign Up</a></p>
        </form>
        <img class="background" src="https://images.unsplash.com/photo-1520453803296-c39eabe2dab4?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=08fc09f5f5be936c6759ab0cf80ab900&w=1000&q=80">
    </body>
</html>