<?php

namespace App\Models;

use CodeIgniter\Model;

class InfoModel extends Model
{
    protected $table      = 'personal_info';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'full_name',
        'gender',
        'address',
        'phone',
        'email',
    ];

    protected $useTimestamps = false;
}
