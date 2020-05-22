<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uzsakymas extends Model
{
    protected $table = 'uzsakymas';
    protected $primaryKey= 'id_Uzsakymas';
    public $timestamps = false;

    protected $fillable = ['Busena','Data','fk_id_Klientas',
        'fk_id_krepselis', 'fk_id_apmokejimas'];

}
