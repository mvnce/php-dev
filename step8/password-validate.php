<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 3/29/16
 * Time: 04:20
 */

$open = true;
require 'lib/site.inc.php';
$view = new Felis\PasswordValidateView($site, $_GET);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $view->head(); ?>
</head>

<body>
<div class="password">

    <!-- Create the body HTML here -->

    <?php
    echo $view->header();
    ?>

    <?php
    echo $view->present();
    ?>

    <?php
    echo $view->footer();
    ?>

</div>

</body>
</html>