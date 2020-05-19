<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Krepselis extends Model
{
    protected $table = 'krepselis';
    protected $primaryKey= 'id_krepselis';
    public $timestamps = false;

    protected $fillable = ['suma','fk_id_Uzsakymas'];
}
