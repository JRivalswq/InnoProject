<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Panel extends Model
{
    public static function showAll()
    {
        return Panel::all();
    }
}
