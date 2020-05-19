<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preke_krepselis extends Model
{
    protected $table = 'preke_krepselis';
    protected $primaryKey= 'id_Papildoma';
    public $timestamps = false;

    protected $fillable = ['kiekis','fk_id_krepselis','fk_id_preke'];
}
