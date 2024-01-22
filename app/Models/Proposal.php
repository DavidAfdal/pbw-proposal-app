<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    protected $table = "proposal";
    protected $primaryKey = "id";
    protected $fillable = ["id","peneliti", "judul", "tanggal", "topik", "bidang_ilmu", "file", "status","nidn_dosen", "nidn_peninjau", "skema"];

    public function anggotaDosen()
    {
        return $this->hasMany(AnggotaDosen::class, "id_proposal");
    }
    public function anggotaMahasiswa()
    {
        return $this->hasMany(AnggotaMahasiswa::class, "id_proposal");
    }
    public function mitra()
    {
        return $this->hasMany(Mitra::class, "id_proposal");
    }
    public function comment()
    {
        return $this->hasMany(Comment::class, "id_proposal");
    }

    public function peninjau()
    {
        return $this->belongsTo(Dosen::class, "nidn_peninjau");
    }


}
