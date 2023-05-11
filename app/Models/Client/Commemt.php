<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commemt extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'commemt','user_id','commemt_post_id','status','commemt_parent_commemt'
    ]; 

    protected $primaryKey = 'commemt_id ';
    protected $table = 'tbl_comment';
    public function Post(){
      return $this->belongsTo('App\Models\Backend\Post','commemt_post_id');
    }
}
