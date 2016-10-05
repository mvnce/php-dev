<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 3/29/16
 * Time: 22:46
 */

$open = true;
require 'lib/site.inc.php';
$view = new Felis\LostPasswordView($site, $_GET);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $view->head(); ?>
</head>

<body>
<div class="password">
    <?php
    echo $view->header();
    echo $view->present();
    echo $view->footer();
    ?>
</div>

</body>
</html>
