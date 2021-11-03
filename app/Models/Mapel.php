<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'finish',
    ];
    public function mahasiswas(){
        return $this->belongsToMany(Mahasiswa::class)->withTimestamps();
    }
}
