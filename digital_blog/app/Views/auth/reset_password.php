<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Redefinir Senha</title>
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
      <h2 class="text-center mb-4">Redefinir Senha</h2>
      <form action="/reset-password" method="post">
        <input type="hidden" name="token" value="<?= $token ?>">
        <div class="mb-3">
          <label for="password" class="form-label">Nova Senha</label>
          <input type="password" name="password" class="form-control" id="password" placeholder="Digite sua nova senha" required>
        </div>
        <div class="mb-3">
          <label for="confirm_password" class="form-label">Confirmar Nova Senha</label>
          <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirme sua nova senha" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Redefinir Senha</button>
      </form>
    </div>
  </div>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
