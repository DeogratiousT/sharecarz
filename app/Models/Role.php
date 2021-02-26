<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Role extends Model
{
    use HasSlug;

    protected $fillable = ['name','slug'];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function hasRole(Array $roleSlugs)
    {
        foreach ($roleSlugs as $roleSlug) {
            if ($roleSlug == $this->slug) {
                return true;
            }
            return false;
        }
    }
}
