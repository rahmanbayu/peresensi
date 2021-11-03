<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $fillable = [ 'name', 'nim', 'kelas',];

    public function mapels(){
        return $this->belongsToMany(Mapel::class);
    }
}
