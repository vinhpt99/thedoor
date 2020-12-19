<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table = 'staff';
    // public function dept(){
    //     return $this->belongsTo('App\Models\Dept', 'id_dept', 'id');
    // }
}
