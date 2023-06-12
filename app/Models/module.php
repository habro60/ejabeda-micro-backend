<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class module extends Model
{
   
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get modules with permissions
     *
     * @return mixed
     */
    public static function getWithPermissions()
    {
        return Cache::rememberForever('permissions.getWithPermissions', function() {
            return self::with('permissions')->get();
        });
    }

    /**
     * Flush the cache
     */
    public static function flushCache()
    {
        Cache::forget('permissions.getWithPermissions');
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::updated(function () {
            self::flushCache();
        });

        static::created(function() {
            self::flushCache();
        });

        static::deleted(function() {
            self::flushCache();
        });
    }

    public static function withPermissionsAndUrls()
{
    return self::with('permissions')->get()->map(function ($module) {
        $module->url = $module->url ?: '#'; // set a default URL if none is provided
        $module->permissions->map(function ($permission) use ($module) {
            $permission->url = $module->url . '/' . $permission->slug; // set the URL for each permission based on the module URL
            return $permission;
        });
        return $module;
    });
}

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}
