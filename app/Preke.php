<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preke extends Model
{
    protected $table = 'preke';
    protected $primaryKey= 'id_preke';
    public $timestamps = false;

    protected $fillable = ['pavadinimas','aprasymas','kaina','ikelimo_data','ivertinimas',
        'ivertinimu_sk','ilgis','diametras','galiuko_aukstis','fk_prekes_kategorija'];

//    public function kategorija()
//    {
//        return $this->belongsTo('App\Kategorija', 'fk_id_Prekes_kategorija');
//    }
}
