<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model {
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'description', 'img_url', 'created_at', 'author'];
}
