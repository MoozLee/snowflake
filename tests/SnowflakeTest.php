<?php

require_once realpath(dirname(__FILE__) . '/Test.php');

use HollyTeng\Snowflake\Snowflake;

$id = Snowflake::generateID();

var_dump($id);

$time = Snowflake::getTimeFromID($id);

var_dump($time);
