<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Community extends Model
{
    use HasFactory;
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class); // Assuming `region_id` in the communities table
    }

    public function spouseRegion(): BelongsTo
    {
        return $this->belongsTo(Region::class, 'spouse_region_id'); // Explicitly define `spouse_region_id` as the foreign key
    }
}
