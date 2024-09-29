<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Posts</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .navbar {
      background-color: #001f3f;
    }
    .navbar-brand, .nav-link {
      color: white !important;
    }
    .card {
      border: none;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
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

  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <span class="navbar-brand">Digital Blog</span>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="/posts">Posts</a>
          </li>
        </ul>
        <ul class="navbar-nav d-flex align-items-center">
          <li class="nav-item">
            <span class="navbar-text text-white me-2">
              <i class="fas fa-user"></i> <?= session()->get('user_name'); ?>
            </span>
          </li>
          <li class="nav-item">
            <button class="nav-link btn btn-link" data-bs-toggle="modal" data-bs-target="#logoutModal">Sair</butto>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-4">
  <h1 class="mb-4">Lista de Posts</h1>
  <a href="/posts/create" class="btn btn-primary mb-3">Criar Novo Post</a>

  <?php foreach ($posts as $post): ?>
    <div class="card mb-4">
      <div class="card-body">
        <h2 class="card-title"><?= $post['title'] ?></h2>
        <p class="card-text"><?= $post['description'] ?></p>
        <?php if (!empty($post['img_url'])): ?>
          <img src="<?= $post['img_url'] ?>" alt="Imagem do Post" class="img-fluid mb-3">
        <?php endif; ?>
      </div>
      <div class="card-footer text-end">
        <a href="/posts/edit/<?= $post['id'] ?>" class="btn btn-warning">Editar</a>
        <a href="/posts/delete/<?= $post['id'] ?>" class="btn btn-danger">Deletar</a>
      </div>
    </div>
  <?php endforeach; ?>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!-- Modal de Confirmação -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Confirmar Saída</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Você tem certeza que deseja sair?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a href="/logout" class="btn btn-danger">Sair</a>
            </div>
        </div>
    </div>
</div>
