<?php require __DIR__ . '/../_common/header.php'?>

<p><a href="/">To home page</a></p>
<h1>New blog post</h1>
<?php if ($isLoggedIn): ?>
    <form action="/posts/save" method="post">
        <label for="title">Title</label><br />
        <input type="text" name="title" /><br />
        <label for="title">Content</label><br />
        <textarea name="content"></textarea><br />
        <button type="submit">Save</button>
    </form>
<?php else: ?>
    <p>You need to <a href="/auth/login">login</a> to create posts</p>
<?php endif; ?>

<?php require __DIR__ . '/../_common/footer.php'?>