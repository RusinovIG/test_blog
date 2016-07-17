<?php require __DIR__ . '/../_common/header.php'?>

<h1><?= $post->title() ?></h1>
<p>Created: <?= $post->createdAt() ?></p>
<p><?= $post->content() ?></p>

<h2>Comments</h2>
<form action="/comments/save" method="post">
    <fieldset>
        <legend>Add comment</legend>
        <label for="title">Text</label><br />
        <textarea name="text"></textarea><br />
        <input type="hidden" name="post_id" value="<?= $post->id() ?>" />
        <button type="submit">Save</button>
    </fieldset>
</form><br />

<?php foreach ($comments as $comment): ?>
    <div class="post">
        <p><?= $comment->createdAt() ?>: <?= $comment->text() ?></p>
    </div>
<?php endforeach; ?>

<?php require __DIR__ . '/../_common/footer.php'?>