<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategorija extends Model
{
    protected $table = 'prekes_kategorija';
    protected $primaryKey= 'id_kateg';
    public $timestamps = false;

    protected $fillable = ['pavadinimas','nuotraukospav'];
}
