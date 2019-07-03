<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelEvent extends Model
{
    protected $table = 'event';

    protected $fillable = ['nama','kategori','foto','tanggal', 'isi'];
}
