<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "post";

    protected $fillable = [
        'user_id', 'title', 'excerpt', 'img_path', 'min_to_read', 'body', 'is_published'
    ];
    // protected $primaryKey = 'title';
    // protected $timestamps = false;
    // protected $dateTime = 'U'; // add 
    //protected $connection = 'sqlite'; //define different db connections to each model
    // protected $attritures = [
    //     'is_publisehed' => true
    // ]; //Setting default values

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function meta() {
        return $this->hasOne(PostMeta::class);
    }
}
