<!DOCTYPE html>
<html>
    <head>
        <title><?= $pageTitle; ?></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style type="text/css">
            body {
                padding-top: 70px;
            }

            .navbar-right {
                margin-right: 15px;
            }
        </style>
        <?php
        if (isset($styleSheets)) {
            foreach ($styleSheets as $cssLink) { ?>
                <link rel="stylesheet" type="text/css" href="<?= base_url($cssLink) ?>"/>
            <?php }
        }
        ?>
    </head>
    <body>