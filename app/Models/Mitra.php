<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;
    protected $table = "mitra";
    protected $primaryKey = "id";
    protected $fillable = ["nama","id_proposal", "pemimpin"];

    public function proposal()
    {
        return $this->belongsTo(Proposal::class, "id_proposal");
    }
}
