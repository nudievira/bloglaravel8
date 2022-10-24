<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Category;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    use HasFactory;

    use SoftDeletes;

    public function category(){
        return $this->BelongsTo('App\Models\Category');
    }
    
    protected $table = 'posts';
    protected $guarded = [];

    public function Tags(){
        return $this->belongsToMany('App\Models\Tags');
    }

    public function users(){
        return $this->belongsTo('App\models\User','user_id','id');
    }

}
