<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    use HasFactory;


    protected $table = 'items';

    protected $fillable = ['name','des','price','old_price','made', 'size', 'color','image','status','tags','store_id', 'category_id', 'created_at','updated_at','deleted_at'];

    // protected $hidden = ['created_at','updated_at','deleted_at'];

    // protected $dates = ['deleted_at'];


    public function store()
    {
        return $this->belongsTo('App\Models\store', 'store_id');
    }

    public function category ()
    {
        return $this->belongsTo('App\Models\category', 'category_id');
    }

    public function orders ()
    {
        return $this->hasMany('App\Models\order', 'item_id', 'id');
    }


}
