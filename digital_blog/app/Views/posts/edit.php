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

  <div class="container mt-4">
    <h1 class="mb-4">Editar Post</h1>
    <form action="/posts/update/<?= $post['id'] ?>" method="post">
      <div class="mb-3">
        <label for="title" class="form-label">Título</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= $post['title'] ?>" required>
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Descrição</label>
        <textarea class="form-control" id="description" name="description" rows="4" required><?= $post['description'] ?></textarea>
      </div>
      <div class="mb-3">
        <label for="img_url" class="form-label">URL da Imagem</label>
        <input type="text" class="form-control" id="img_url" name="img_url" value="<?= $post['img_url'] ?>">
      </div>
      <button type="submit" class="btn btn-primary">Atualizar Post</button>
      <a href="/posts" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
