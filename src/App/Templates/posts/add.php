<?php require __DIR__ . '/../_common/header.php'?>

    <h1>New blog post</h1>
    <form action="/posts/save" method="post">
        <label for="title">Title</label><br />
        <input type="text" name="title" /><br />
        <label for="title">Content</label><br />
        <textarea name="content"></textarea><br />
        <button type="submit">Save</button>
    </form>

<?php require __DIR__ . '/../_common/footer.php'?>