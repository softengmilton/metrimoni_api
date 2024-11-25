<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserProfile extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function region()
    {
        return $this->belongsTo(Region::class); // Assuming the foreign key is `region_id` in the profiles table
    }

    public function community()
    {
        return $this->belongsTo(Community::class); // Assuming the foreign key is `community_id` in the profiles table
    }
    public function spouseRegion()
    {
        return $this->belongsTo(Region::class, 'spouse_region_id'); // assuming `spouse_region_id` is the column
    }
    public function spouseCommunity()
    {
        return $this->belongsTo(Community::class, 'spouse_community_id'); // assuming `spouse_community_id` is the column
    }


}
