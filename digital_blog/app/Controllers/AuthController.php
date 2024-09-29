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
}
