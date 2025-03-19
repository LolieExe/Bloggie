<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login to access your account.">
    <title>Login | Your Website Name</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

    <div class="login-container">
        <h1>Login</h1>
        
        <form action="traitement.php" method="POST">
            
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Enter your password">
            </div>
            
            <div class="input-group">
                <input type="submit" value="Login">
            </div>
        </form>
        <?php if(isset($_GET['error'])): ?>
            <div class="error-message">
                <p style="color: red;">Invalid username or password. Please try again.</p>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>
