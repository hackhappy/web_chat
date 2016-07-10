<?php
/**
 * Created by PhpStorm.
 * User: hackhappy
 * Date: 7/1/2016
 * Time: 8:37 PM
 */

echo "Starting Script";
exec('php -f server.php > /dev/null 2>&1 & echo $!');
echo "Thanks, Script is running in background";
?>