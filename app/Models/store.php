<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class store extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected   $table  = 'stores';

    protected   $fillable   = ['name','des','phone', 'email', 'facebook','twitter','instagram','linkedin','image','cover', 'timeend','payment','delivery','subscription','auto_sub','address','currency', 'status', 'user_id'];

    // protected   $hidden     = ['user_id', 'deleted_at', 'created_at', 'updated_at'];

    public      $timestamps     = true;

    protected   $dates  = ['deleted_at'];


    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function items () {
        return $this->hasMany('App\Models\item', 'store_id', 'id');
    }

    public function categorys () {
        return $this->hasMany('App\Models\category', 'store_id', 'id');
    }

    public function orders () {
        return $this->hasMany('App\Models\order', 'store_id', 'id');
    }

    public function messages()
    {
        return $this->hasMany(message::class, 'store_id', 'id');
    }

    public function careers ()
    {
        return $this->hasMany(career::class, 'store_id');
    }

}
