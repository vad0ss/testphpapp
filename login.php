<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/style.css" rel="stylesheet" />
</head>

<body>

            <form id="loginForm" action="/actions.php?type=login" method="post">

                <div class="field">
                    <label>Username:</label>
                    <div class="input">
                        <input type="text" name="user_name" value="" id="login" />
                    </div>
                </div>

                <div class="field">
                    <label>Password:</label>
                    <div class="input"><input type="password" name="user_password" value="" id="pass" /></div>
                </div>

                <div class="submit">
                    <button type="submit" name="login">Login</button>
                </div>


            </form>

</body>
</html>

