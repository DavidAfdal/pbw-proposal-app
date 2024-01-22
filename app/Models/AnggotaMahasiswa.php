<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaMahasiswa extends Model
{
    use HasFactory;
    protected $table = "anggota_mahasiswa";
    protected $primaryKey = "id";
    protected $fillable = ["nama","npm", "id_proposal"];

    public function proposal()
    {
        return $this->belongsTo(Proposal::class, "id_proposal");
    }
}
