<?php

    session_start();

    require_once ("../vendor/autoload.php");

    use Clickatell\Api\ClickatellHttp;
    use Clickatell\Api\ClickatellRest;

    // Set up objects

    // if you registered the http api https://www.clickatell.com/
    $clickatell = new ClickatellHttp('username', 'password', '1234567');

    // if you registered the rest api https://www.clickatell.com/
    // $clickatell = new ClickatellRest("token1252425");

    // Our authentication object
    $authentication = new Authentication($clickatell);

    // Default page
    $page = "login.php";

    // Authentication logic
    if (isset($_REQUEST['Submit'])) {
        // Login form
        if (isset($_REQUEST['Username']) && isset($_REQUEST['Password'])) {
            $mobile = $authentication->authenticate($_REQUEST['Username'], $_REQUEST['Password']);
            if ($mobile) {
                $_SESSION['mobile'] = $mobile;
                if ($authentication->sendPin($mobile)) {
                    $page = "pin.php";
                } else {
                    $page = "error.php";
                }
            } else {
                $page = "error.php";
            }
        }

        // Pin form
        if (isset($_REQUEST['Pin'])) {
            if ($authentication->checkPin($_REQUEST['Pin'])) {
                $page = "success.php";
            } else {
                $page = "error.php";
            }
        }
    }


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Two way authentication example</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Le styles -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
        }
    </style
</head>
<body>
<div class="container"><h1>Two way authentication example</h1>
    <hr />
    <?php require_once($page); ?>
</div>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</body>
</html>