<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrekeKrepselis extends Model
{
    protected $table = 'preke_krepselis';
    protected $primaryKey= 'id_Tarpine';
    public $timestamps = false;

    protected $fillable = ['kiekis','fk_krepselis','fk_preke'];
}
