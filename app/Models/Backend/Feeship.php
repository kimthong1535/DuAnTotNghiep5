<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feeship extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'matp','maqh','xaid','fee_feeship'
    ]; 

    protected $primaryKey = 'id';
    protected $table = 'feeship';

    public function city(){
      return $this->belongsTo('App\Models\Backend\City','matp');
    }
    public function province(){
      return $this->belongsTo('App\Models\Backend\Province','maqh');
    }
    public function wards(){
      return $this->belongsTo('App\Models\Backend\Wards','xaid');
    }
}
