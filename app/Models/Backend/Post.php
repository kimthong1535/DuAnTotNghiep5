<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $dates = [
      'created_at',
      'updated_at'
    ];

    public $timestamps = false;
    protected $fillable = [
        'post_title','post_desc','post_content','post_keywords','post_status',
        'post_images','post_meta_desc','category_post_id','post_slug','created_at','updated_at'
    ]; 

    protected $primaryKey = 'post_id';
    protected $table = 'tbl_post';
     public function commemt(){
      return $this->hasMany('App\Models\Client\commemt');
    }
}
