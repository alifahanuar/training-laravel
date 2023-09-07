<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staffs';

    protected $fillable = [
        'tag',
        'user_id',
    ];

    public function users() {
        return $this -> belongsTo (User:: class, 'user_id','id');  //foreign key dia userid, primary key dia id
    }
}
