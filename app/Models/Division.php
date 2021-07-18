<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'level',
        'parent_id',
    ];

    public function children(){
        return $this->hasMany(self::class, 'parent_id');
    }
    public function parent(){
        return $this->belongsTo(self::class, 'parent_id');
    }
}
