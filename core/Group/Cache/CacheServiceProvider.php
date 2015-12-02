<?php

namespace core\Group\Cache;

use ServiceProvider;
use core\Group\Cache\redisCache;

class CacheServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return object
     */
    public function register()
    {
        $cache = null;

        if(\Config::get("database::cache") == 'redis') $cache = 'redisCache';

        if($cache == 'redisCache') {

            $this -> app -> singleton($cache, function () {

                return new redisCache($this -> app);
            });
        }
    }

}