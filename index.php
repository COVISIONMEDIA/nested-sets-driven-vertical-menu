<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

require_once ('./classes/sections.class.php');

$menu = new sections();



?>
<!DOCTYPE html>
<html>
<head>
    <title>COVISIONMEDIA - ajax & nested stets driven responsive vertical menu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <meta name="apple-mobile-web-app-capable" CONTENT="yes">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/style-menu.css" />

    <script  src="assets/js/jquery-1.11.2.min.js"></script>
    <script  src="assets/js/jquery.vertical-menu.js"></script>

</head>
<body>
<div class="container wrapper">

    <header>
        <div class="toggler">
            <button class="navbar-toggler open-menu">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </button>

        </div>
    </header>
    <div class="row">

        <aside class="col-12 col-sm-12 col-md-4 col-lg-3">

            <?php

            echo $menu->treeAsHtml($_GET['id']);

            ?>

        </aside>
        <section class="col-12 col-sm-12 col-md-8 col-lg-9">

            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.

        </section>

    </div>
</div>


<script type="text/javascript">

    var id = <?php echo $_GET['id']; ?>;

    $('#cssmenu').verticalMenu({

        vertical_menu: {

            current_menu_id: id, //$open_menues is json encoded
            show_drop_icon_on_width: 992 //show drop icon on width in px

        }

    });

    $( document ).ready(function() {

        $('.open-menu').click(function() {

            $( "aside" ).toggle();
            $("html, body").animate({ scrollTop: 0 }, "slow");

        });
    });

</script>
</body>
</html>