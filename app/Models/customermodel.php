<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customermodel extends Model
{
    protected $table = 'customer';
       protected $primaryKey = 'id_customer';
       public $timestamps = false;

       protected $fillable = [
           'id_customer',
           'nama_customer',
           'alamat',
           'no_telp',
           'id',
           'id_paket',
       ];
}
