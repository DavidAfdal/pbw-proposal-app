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
}
