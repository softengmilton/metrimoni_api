<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    public function communities() :HasMany
    {
        return $this->hasMany(Community::class);
    }
}
