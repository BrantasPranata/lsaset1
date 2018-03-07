<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    protected $table = 'asets';
    // Primary Key
    public $PrimaryKey = 'id';
    // Timestamp (sebenernya by default sudah true)
    public $timestamps = true;

    protected $hidden = ['id','created_at','updated_at'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function scopeSearch($query, $s){
        return $query->where('merk', 'like', '%' .$s.'%')
        ->orWhere('tipe_barang','like','%'.$s.'%');
        
    }

}
