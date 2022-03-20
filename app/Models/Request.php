<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    public $incrementing = false;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at'; 
    protected $keyType = 'string';
    protected $primaryKey = 'req_id';
}
