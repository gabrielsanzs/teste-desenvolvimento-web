<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

<div class="container d-flex justify-content-center align-items-center min-vh-100">
  <div class="card p-4" style="width: 100%; max-width: 400px;">
    <h2 class="text-center mb-4">Registrar</h2>

    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
      </div>
    <?php endif; ?>

    <?php if (isset($validation)): ?>
      <div class="alert alert-danger">
        <?= $validation->listErrors(); ?>
      </div>
    <?php endif; ?>

    <form action="/register" method="post">
      <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Digite seu nome" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Digite seu email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Senha</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Digite sua senha" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Registrar</button>
    </form>
    <div class="text-center mt-3">
      <a href="/login" class="text-decoration-none">Já tem conta? Faça login</a>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
