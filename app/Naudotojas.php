<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Naudotojas extends Model
{
    protected $table = 'naudotojas';

    protected $fillable = ['vardas', 'pavarde', 'gimdat', 'tel', 'pastas', 'asmkod', 'adresas'];

    /* nurodome kad  nenaudosime created_at ir updated_at laukų šiame modulyje*/
    public $timestamps = false;
}
