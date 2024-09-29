<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RedirectResponse;

class AuthController extends Controller
{

    public function register(): string
    {
        return view(name: 'auth/register');
    }

    public function attemptRegister(): RedirectResponse
    {
        $userModel = new UserModel();

        $validation = $this->validate(rules: [
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with(key: 'errors', message: $this->validator->getErrors());
        }

        $hashedPassword = password_hash(password: $this->request->getPost(index: 'password'), algo: PASSWORD_DEFAULT);

        $data = [
            'name' => $this->request->getPost(index: 'name'),
            'email' => $this->request->getPost(index: 'email'),
            'password' => $hashedPassword,
        ];

        if ($userModel->insert($data)) {
            return redirect()->to('/login')->with('success', 'Registro realizado com sucesso. Faça login.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Falha ao registrar o usuário.');
        }
        
    }

    
    public function login(): string
    {
        return view(name: 'auth/login');
    }

    public function attemptLogin(): RedirectResponse
    {
        $session = session();
        $userModel = new UserModel();

        $email = $this->request->getPost(index: 'email');
        $password = $this->request->getPost(index: 'password');

        $user = $userModel->where(key: 'email', value: $email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'E-mail ou senha incorretos!');
        }
        
        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'E-mail ou senha incorretos!');
        }
        
        $session->set('user_id', $user['id']);
        $session->set('user_name', $user['name']);
        return redirect()->to('/posts')->with('success', 'Login realizado com sucesso.');
    }

    public function logout(): RedirectResponse
    {
        session()->destroy();
        return redirect()->to(uri: '/login');
    }

    public function forgotPassword()
    {
        return view('auth/forgot_password');
    }
    public function sendResetLink()
    {
        $email = $this->request->getPost('email');

        // Verifique se o usuário existe
        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Endereço de email não encontrado.');
        }

        // Gere o token de redefinição de senha (você pode personalizar isso)
        $token = bin2hex(random_bytes(50));

        // Aqui você pode salvar o token no banco de dados associado ao usuário, se necessário.

        // Monte o link de redefinição de senha
        $resetLink = base_url('/reset-password?token=' . $token);

        // Envio do email
        $emailService = \Config\Services::email();

        $emailService->setTo($email);
        $emailService->setSubject('Redefinição de Senha');
        $emailService->setMessage("Clique no link a seguir para redefinir sua senha: <a href='" . $resetLink . "'>Redefinir Senha</a>");

        if ($emailService->send()) {
            return redirect()->back()->with('success', 'Email de redefinição de senha enviado com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Erro ao enviar o email.');
        }
    }

    public function resetPassword()
    {
        $token = $this->request->getGet('token');
        
        $db = \Config\Database::connect();
        $builder = $db->table('password_resets');
        $resetData = $builder->where('token', $token)->get()->getRow();
        
        if ($resetData) {
            return view('auth/reset_password', ['token' => $token]);
        } else {
            return redirect()->to('/login')->with('error', 'Link inválido ou expirado.');
        }
    }

    public function updatePassword()
    {
        $token = $this->request->getPost('token');
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');

        if ($password !== $confirmPassword) {
            return redirect()->back()->with('error', 'As senhas não coincidem.');
        }

        $db = \Config\Database::connect();
        $builder = $db->table('password_resets');
        $resetData = $builder->where('token', $token)->get()->getRow();

        if ($resetData) {
            $userModel = new \App\Models\UserModel();
            $user = $userModel->where('email', $resetData->email)->first();

            if ($user) {
                // Atualize a senha do usuário
                $userModel->update($user['id'], ['password' => password_hash($password, PASSWORD_DEFAULT)]);

                // Exclua o token usado
                $builder->where('token', $token)->delete();

                return redirect()->to('/login')->with('message', 'Senha redefinida com sucesso.');
            }
        }

        return redirect()->to('/login')->with('error', 'Link inválido ou expirado.');
    }

}
