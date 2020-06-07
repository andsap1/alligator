<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apmokejimas extends Model
{
    protected $table = 'apmokejimas';
    protected $primaryKey= 'id_apmokėjimas';
    public $timestamps = false;

    protected $fillable = ['suma','fk_uzsakymas'];

}
