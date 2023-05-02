<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    use HasFactory;
    protected $fillable = ['uid', 'name', 'division'];
    protected $table = 'staff' ;
    public $timestamps = false;
}
