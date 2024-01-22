<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Dosen extends Authenticatable
{
    use HasFactory;
    protected $table = "dosen";
    protected $primaryKey = "nidn";
    protected $fillable = ["nidn","nama", "password", "role"];

    public function review()
    {
        return $this->hasMany(Comment::class, "nidn_dosen");
    }

    public function proposalTinjauan()
    {
        return $this->hasOne(Proposal::class, "nidn_peninjau");
    }

    public function proposalUser() {
        return $this->hasMany(Proposal::class, "nidn_dosen");
    }

}
