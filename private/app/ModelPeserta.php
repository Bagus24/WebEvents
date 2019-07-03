<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelPeserta extends Model
{
    protected $table = 'peserta';

    protected $fillable = ['nama','email','no_hp','alamat'];
}
