<?php

namespace HollyTeng\Snowflake;

class Snowflake
{
    const INITIAL_EPOCH = 1491533672000;
    const SHARD_ID = 1;

    /**
     * Generate the 64bit unique ID.
     * @return number BIGINT
     */
    public static function generateID()
    {
        /**
        * Current Timestamp - 41 bits
        */
        $curr_timestamp = floor(microtime(true) * 1000);

        /**
        * Subtract custom epoch from current time
        */
        $curr_timestamp -= self::INITIAL_EPOCH;
        
        /**
        * Create a initial base for ID
        */
        $base = decbin(pow(2, 40) - 1 + $curr_timestamp);

        /**
        * Get ID of database server (10 bits)
        * Up to 512 machines
        */
        $shard_id = decbin(pow(2, 9) - 1 + self::SHARD_ID);

        /**
        * Generate a random number (12 bits)
        * Up to 2048 random numbers per db server
        */
        $random_part = mt_rand(1, pow(2, 11)-1);
        $random_part = decbin(pow(2, 11)-1 + $random_part);

        /**
        * Concatenate the final ID
        */
        $final_id = bindec($base) . bindec($shard_id) . bindec($random_part);

        /**
        * Return unique 64bit ID
        */
        return $final_id;
    }

    /**
     * Return time from 64bit ID.
     * @param $id
     * @return number
     */
    public static function getTimeFromID($id)
    {
        return bindec(substr(decbin($id), 0, 41)) - pow(2, 40) + 1 + self::INITIAL_EPOCH;
    }
}
