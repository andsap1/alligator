<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nuotrauka extends Model
{
    protected $table = 'prekes_nuotrauka';
    protected $primaryKey= 'id_nuotrauka';
    public $timestamps = false;

    protected $fillable = ['pavadinimas'];
}
