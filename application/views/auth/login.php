<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<?php if ($message): ?>
    <p><?php echo $message; ?></p>
<?php endif; ?>

<form action="<?php echo URL::site('auth/login'); ?>" method="post">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Login</button>
</form>

</body>
</html>
