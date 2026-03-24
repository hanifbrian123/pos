<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name'
    ];
    
    public function menus() {
        return $this->belongsToMany(Menu::class);
    }
}
