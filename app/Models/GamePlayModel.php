<?php

namespace App\Models;

use CodeIgniter\Model;

class GamePlayModel extends Model
{
    protected $table      = 'game_play';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['location', 'scene', 'right_attempt', 'wrong_attempt', 'total_attempt', 'total_time'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}