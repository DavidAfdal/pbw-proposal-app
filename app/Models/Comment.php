<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = "comment";
    protected $primaryKey = "id";
    protected $fillable = ["nidn_dosen","review", "id_proposal"];

    public function proposal()
    {
        return $this->belongsTo(Proposal::class, "id_proposal");
    }
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, "nidn_dosen");
    }
}


