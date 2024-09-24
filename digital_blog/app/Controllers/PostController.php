<?php

namespace App\Controllers;

use App\Models\PostModel;
use CodeIgniter\Controller;

class PostController extends Controller {

    public function index(): string {
        $postModel = new PostModel();
        $data['posts'] = $postModel->findAll();
        return view(name: 'posts/index', data: $data);
    }

    public function create() {
        return view('posts/create');
    }

    public function store(): RedirectResponse {
        $postModel = new PostModel();
        $data = [
            'title' => $this->request->getPost(index: 'title'),
            'description' => $this->request->getPost(index: 'description'),
            'img_url' => $this->request->getPost(index: 'img_url'),
            'author' => session()->get(key: 'user')['id']
        ];
        $postModel->insert(row: $data);
        return redirect()->to(uri: '/posts');
    }

    public function edit($id): string {
        $postModel = new PostModel();
        $data['post'] = $postModel->find(id: $id);
        return view(name: 'posts/edit', data: $data);
    }

    public function update($id): RedirectResponse {
        $postModel = new PostModel();
        $data = [
            'title' => $this->request->getPost(index: 'title'),
            'description' => $this->request->getPost(index: 'description'),
            'img_url' => $this->request->getPost(index: 'img_url')
        ];
        $postModel->update(id: $id, row: $data);
        return redirect()->to(uri: '/posts');
    }

    public function delete($id) {
        $postModel = new PostModel();
        $postModel->delete($id);
        return redirect()->to('/posts');
    }
}
