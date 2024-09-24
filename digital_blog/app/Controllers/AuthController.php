<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller {

    public function register() {
        return view(name: 'auth/register');
    }

    public function create(): RedirectResponse {
        $userModel = new UserModel();
        $data = [
            'name' => $this->request->getPost(index: 'name'),
            'email' => $this->request->getPost(index: 'email'),
            'password' => password_hash(password: $this->request->getPost(index: 'password'), algo: PASSWORD_DEFAULT)
        ];
        $userModel->insert(row: $data);
        return redirect()->to(uri: '/login');
    }

    public function login(): string {
        return view(name: 'auth/login');
    }

    public function attemptLogin(): RedirectResponse {
        $userModel = new UserModel();
        $user = $userModel->where(key: 'email', value: $this->request->getPost(index: 'email'))->first();

        if ($user && password_verify(password: $this->request->getPost('password'), hash: $user['password'])) {
            session()->set(data: ['user' => $user]);
            return redirect()->to(uri: '/posts');
        } else {
            return redirect()->to(uri: '/login')->with(key: 'error', message: 'Invalid credentials');
        }
    }

    public function logout(): RedirectResponse {
        session()->destroy();
        return redirect()->to(uri: '/login');
    }
}
