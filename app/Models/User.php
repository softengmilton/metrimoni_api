<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];
    protected $with = ['primaryImage'];
    protected $appends = ['primary_image_url'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }



    /*----------------------------------------
     * Relationships
     ----------------------------------------*/
    public function primaryImage(): MorphOne
    {
        return $this->morphOne(Media::class, 'media')->where('media_role','profile_image');
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Media::class, 'media');
    }


    public function profile() :HasOne
    {
        return $this->hasOne(UserProfile::class);
    }


    /*----------------------------------------
     * Accessors
     ----------------------------------------*/
    public function getPrimaryImageUrlAttribute(): string
    {
        $defaultImageUrl = asset('assets/default/default_image.jpg');
        if ($this->relationLoaded('primaryImage') && $this->primaryImage) {
            return $this->primaryImage->url;
        }
        if ($this->primaryImage) {
            return $this->primaryImage->url;
        }

        return $defaultImageUrl;
    }



}
