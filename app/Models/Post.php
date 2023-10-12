<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "posts";
    protected $fillable = [
        'name',
        'npp',
        'status',
        'jabatan',
    ];
    public function absen()
    {
        return $this->hasMany(Absen::class);
    }
    public function sk()
    {
        return $this->belongsTo(Sk::class);
    }
}
