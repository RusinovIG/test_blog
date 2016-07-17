<?php require __DIR__ . '/_common/header.php'?>

<h1>Login page</h1>

<p><a href="/">To home page</a></p>

<form action="/auth/auth" method="post">
    <label>Login</label><br />
    <input type="text" name="login" /><br />
    <label>Password</label><br />
    <input type="password" name="password" /><br />
    <button type="submit">Login</button>
</form>

<?php require __DIR__ . '/_common/footer.php'?>