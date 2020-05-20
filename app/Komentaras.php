<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentaras extends Model
{
    protected $table = 'komentaras';
    protected $primaryKey= 'id_komentaras';
    public $timestamps = false;

    protected $fillable = ['vart_vardas','data','tekstas','fk_preke'];

}
