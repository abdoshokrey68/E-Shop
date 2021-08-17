<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $fillable = [ 'id','name', 'des','parent','store_id'];

    // protected $hidden = ['created_at','updated_at'];

    public function items () {
        return $this->hasMany('App\Models\item', 'category_id','id');
    }

    public function store () {
        return $this->belongsTo('App\Models\store', 'store_id');
    }

}
