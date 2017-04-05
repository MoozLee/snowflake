<?php

require_once realpath(dirname(__FILE__) . '/Test.php');

use HollyTeng\Snowflake\Snowflake;

var_dump(Snowflake::generateID());
