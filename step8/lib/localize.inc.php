<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 3/16/16
 * Time: 08:03
 */

/**
 * Function to localize our site
 * @param $site The Site object
 */
return function(Felis\Site $site) {
    // Set the time zone
    date_default_timezone_set('America/Detroit');

    $site->setEmail('masiyan@cse.msu.edu');
    $site->setRoot('/~masiyan/step8');
    $site->dbConfigure('mysql:host=mysql-user.cse.msu.edu;dbname=masiyan',
        'masiyan',       // Database user
        'PdH2uUUEBKJ3VL7d',     // Database password
        's8_');            // Table prefix
};