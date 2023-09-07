<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "items";

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'details',
        'user_id',
    ];


    //relationship builder
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id'); //foreign key, primary key
    }
}
