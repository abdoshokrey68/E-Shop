<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'des', 'price', 'status', 'count', 'size', 'color','pay_status','item_id', 'store_id', 'category_id', 'user_id','created_at', 'updated_at'];

    protected $hidden = ['created_at', 'updated_at'];

    public function store () {
        return $this->belongsTo('App\Models\store', 'store_id');
    }

    public function categorys () {
        return $this->belongsTo('App\Models\category', 'category_id');
    }

    public function items () {
        return $this->belongsTo('App\Models\item', 'item_id');
    }

    public function users () {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
