<?php

namespace HollyTeng\Snowflake;

use HollyTeng\Snowflake\Snowflake;

trait SnowflakeHelpers
{
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Snowflake::generateID();
        });
    }
}
