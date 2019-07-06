<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModelJadwal extends Model
{
    protected $table = 'jadwal';



    protected $fillable = ['nama_event','hari','jam','kegiatan', 'isi'];

    use SoftDeletes;
    protected $dates =['deleted_at'];

   
}
