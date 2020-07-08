<?php

// Access Age of Empire API for seeding database tables
if (! function_exists('get_civs')) {
    function get_civs(): array
    {
    $url = 'https://age-of-empires-2-api.herokuapp.com/api/v1';
    $json = file_get_contents($url);

    // Convert the raw json to an array
    $array = json_decode($json, true);

    // Access url for array containing civilizations
    $civs_url = $array["resources"]["civilizations"];
    $json = file_get_contents($civs_url);

    $civ_array = json_decode($json, true);
    $civ_array = $civ_array["civilizations"];

    return $civ_array;
    }
}
