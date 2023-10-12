<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sk extends Model
{
    use HasFactory;

    protected $table = "sk";
    protected $fillable = [
        'npp',
        'tanggal_sk',
        'file',
        'jabatan',
        'status',
        'name'
    ];
    public function post()
    {
        return $this->hasMany(Post::class);
    }
}
