<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    protected $table = "proposal";
    protected $primaryKey = "id";
    protected $fillable = ["peneliti", "judul", "tahun", "topik", "bidang_ilmu", "status","nidn_dosen", "nidn_reviewer"];
}
