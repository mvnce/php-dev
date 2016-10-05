<?php
require __DIR__ . '/lib/steampunked.inc.php';
$view = new Steampunked\SteampunkedView($steampunked);
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Steampunked</title>
    <link href="steampunked.css" type="text/css" rel="stylesheet" />
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="site.min.js"></script>
    <script>
        $(document).ready(function() {
            new Steampunked();
        });
    </script>
</head>
<body>
<?php echo $view->present() ?>
</body>
</html>
