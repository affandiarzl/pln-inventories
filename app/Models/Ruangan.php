<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    public $table = "tbl_ruangans";

    use HasFactory;
    protected $guarded = ["id"];
}