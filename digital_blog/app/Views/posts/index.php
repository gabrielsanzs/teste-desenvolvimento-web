<a href="/posts/create">Criar Novo Post</a>
<?php foreach ($posts as $post): ?>
  <div>
    <h2><?= $post['title'] ?></h2>
    <p><?= $post['description'] ?></p>
    <a href="/posts/edit/<?= $post['id'] ?>">Editar</a>
    <a href="/posts/delete/<?= $post['id'] ?>">Deletar</a>
  </div>
<?php endforeach; ?>
