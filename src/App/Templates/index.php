<?php require __DIR__ . '/_common/header.php'?>

<h1>Test CỐC CỐC Blog</h1>
<p><a href="/posts/add">Add new post</a></p>

<h2>Posts</h2>
<?php foreach ($posts as $post): ?>
    <div class="post">
        <h3><?= $post->title() ?></h3>
        <p>Created: <?= $post->createdAt() ?></p>
        <p><?= $post->content() ?></p>
        <p><a href="posts/<?= $post->id() ?>">comments</a></p>
    </div>
<?php endforeach; ?>
<?php if (!count($posts)): ?>
    <p>No posts found</p>
<?php endif; ?>

<?php require __DIR__ . '/_common/footer.php'?>