<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Esqueceu a Senha</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
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
    <h2 class="text-center mb-4">Recuperar Senha</h2>

    <!-- Exibição de mensagens de erro, se houver -->
    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
      </div>
    <?php endif; ?>

    <form action="/send-reset-link" method="post">
      <div class="mb-3">
          <label for="email" class="form-label">Digite seu email</label>
          <input type="email" name="email" class="form-control" id="email" placeholder="Digite seu email" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Enviar email de redefinição</button>
    </form>


    <div class="text-center mt-3">
      <a href="/login" class="text-decoration-none">Voltar ao Login</a>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
