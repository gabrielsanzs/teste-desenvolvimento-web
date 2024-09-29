<?php

namespace App\Controllers;

use App\Models\PostModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RedirectResponse;

class PostController extends Controller {

    public function index(): string {
        $postModel = new PostModel();
        $data['posts'] = $postModel->findAll();
        return view(name: 'posts/index', data: $data);
    }

    public function create(): string {
        return view(name: 'posts/create');
    }

    public function store()
    {
        $postModel = new PostModel();
    
        // Validação dos dados
        $validation = $this->validate([
            'title' => 'required|min_length[3]',
            'description' => 'required',
            'img_url' => 'permit_empty|valid_url',
        ]);
    
        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    
        // Dados para salvar
        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'img_url' => $this->request->getPost('img_url'),
            'created_at' => date('Y-m-d H:i:s'),
            'author' => session()->get('user_id'), // Aqui está assumindo que você está usando session para pegar o ID do autor
        ];
    
        // Inserir no banco
        if ($postModel->insert($data)) {
            return redirect()->to('/posts')->with('success', 'Post criado com sucesso.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Falha ao criar o post.');
        }
    }
    
    public function edit($id): string {
        $postModel = new PostModel();
        $data['post'] = $postModel->find(id: $id);
        return view(name: 'posts/edit', data: $data);
    }

    public function update($id)
    {
        $postModel = new PostModel();
        
        $data = [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'img_url'     => $this->request->getPost('img_url')
        ];
    
        if ($postModel->update($id, $data)) {
            return redirect()->to('/posts')->with('success', 'Post atualizado com sucesso.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Erro ao atualizar o post.');
        }
    }

    public function delete($id): RedirectResponse {
        $postModel = new PostModel();
        $postModel->delete(id: $id);
        return redirect()->to(uri: '/posts');
    }
}
