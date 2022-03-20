<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request_detail extends Model
{
    use HasFactory;
    protected $fillable = ['req_id', 'item_id', 'req_qty', 'req_status'];
}