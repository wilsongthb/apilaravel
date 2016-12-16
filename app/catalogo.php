<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class catalogo extends Model
{
    protected $table = 'catalogo';
    public $primarykey = 'idcatalogo';
    public $timestamps = false;
}
