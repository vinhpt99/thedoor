<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dept extends Model
{
    use HasFactory;
    protected $table = 'depts';
    public function leader()
    {
        return $this->belongsTo('App\Models\Staff', 'leader_id');
    }
}
