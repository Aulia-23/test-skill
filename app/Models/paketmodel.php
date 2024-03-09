<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paketmodel extends Model
{
   protected $table = 'paket';
   protected $primaryKey = 'id_paket';
   public $timestamps = false;

   protected $fillable = [
       'id_paket',
       'nama_paket',
       'harga_paket',
       'deskripsi',
   ];
}
