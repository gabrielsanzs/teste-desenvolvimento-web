<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Título da Página</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .navbar {
      background-color: #001f3f; /* Azul marinho */
    }
    .navbar-brand, .nav-link {
      color: white !important;
    }
    .card {
      border: none;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .btn-primary {
      background-color: #001f3f;
      border-color: #001f3f;
    }
    .btn-primary:hover {
      background-color: #003366;
      border-color: #003366;
    }
  </style>
</head>
<body>


<a href="/posts/create">Criar Novo Post</a>
<?php foreach ($posts as $post): ?>
  <div>
    <h2><?= $post['title'] ?></h2>
    <p><?= $post['description'] ?></p>
    <a href="/posts/edit/<?= $post['id'] ?>">Editar</a>
    <a href="/posts/delete/<?= $post['id'] ?>">Deletar</a>
  </div>
<?php endforeach; ?>
