<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\store;

class career extends Model
{
    use HasFactory;

    protected $fillable = [ 'name', 'des', 'status', 'salary', 'store_id' ];

    public function store ()
    {
        return $this->belongsTo(store::class, 'store_id');
    }
}
