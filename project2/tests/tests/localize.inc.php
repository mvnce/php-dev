<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 4/11/16
 * Time: 16:08
 */

/**
 * Function to localize our site
 * @param $site, the Site object
 */
return function(Steampunked\Site $site) {
    // Set the time zone
    date_default_timezone_set('America/Detroit');

    $site->setEmail('masiyan@cse.msu.edu');
    $site->setRoot('/~masiyan/project2');
    $site->dbConfigure('mysql:host=mysql-user.cse.msu.edu;dbname=masiyan',
        'masiyan',       // Database user
        'PdH2uUUEBKJ3VL7d',     // Database password
        'p2test_');            // Table prefix
};