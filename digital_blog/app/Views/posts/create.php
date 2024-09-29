<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Criar Novo Post</title>
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
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="/posts">Posts</a>
          </li>
        </ul>
        <ul class="navbar-nav">
        <li class="nav-item">
            <button class="nav-link btn btn-link" data-bs-toggle="modal" data-bs-target="#logoutModal">Sair</button>
        </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-4">
    
    <h1 c>Criar Novo Post</h1>
    <div class="card mt-3">
      <div class="card-body">
        <form action="/posts/store" method="post">
          <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Título" required>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea name="description" id="description" class="form-control" placeholder="Descrição" required></textarea>
          </div>
          <div class="mb-3">
            <label for="img_url" class="form-label">URL da Imagem (opcional)</label>
            <input type="text" name="img_url" id="img_url" class="form-control" placeholder="URL da Imagem">
          </div>
          <a href="/posts" class="btn btn-secondary">Voltar</a>
          <button type="submit" class="btn btn-primary">Criar Post</button>
        </form>
      </div>
    </div>
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
