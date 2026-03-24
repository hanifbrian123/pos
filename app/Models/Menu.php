<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'name',
        'category_id'
    ];

    public function items() {
        return $this->belongsToMany(Menu::class);
    }
}
