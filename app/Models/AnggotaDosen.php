<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaDosen extends Model
{
    use HasFactory;
    protected $table = "anggota_dosen";
    protected $primaryKey = "id";
    protected $fillable = ["nama", "nidn", "id_proposal"];
    public function proposal()
    {
        return $this->belongsTo(Proposal::class, "id_proposal");
    }
}
