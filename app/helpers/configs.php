<?php

$data = file_get_contents("../config.json");
$keys = json_decode($data, true);

$custom = 'dev';

foreach ($keys[$custom] as $index => $key) {
    define($index, $key);
}
