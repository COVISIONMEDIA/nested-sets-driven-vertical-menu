## What you nested
The Script as the hole needs a php Server and a mysql database.

## How to make it working
After downloading you can put the hole script in a arbitrary folder on you PHP/MySql Server. To establish the database connection you find the needed constants (database name, user, pass and table prefix) in the root folder inside config.inc.php

## adjust the css to your needs
To just appearance you find the css file in assets/css/style-menu.constants

## Embed the php script in html
your file needs to end with .php.

the header should include the following:

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/style-menu.css" />

    <script  src="assets/js/jquery-1.11.2.min.js"></script>
    <script  src="assets/js/jquery.vertical-menu.js"></script>

on bottom of the body tag include the following

    <script type="text/javascript">

        var id = <?php echo $_GET['id']; ?>;

        $('#cssmenu').verticalMenu({

            vertical_menu: {

                current_menu_id: id, // the id, which is given by php variable (get in this case)
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



## Embed the php script in html
Inside html you can embed the menu tree and class as

on top of the file:

<?php

require_once ('./classes/sections.class.php'); //include the class

$menu = new sections(); //initialize the classes

?>
...

<?php

            echo $menu->treeAsHtml($_GET['id']); //you can use any variable type as long it is the menu id

?>

## errors
some notices can appear when you use a development mode on your server

## Example
Here is my working example <a href="https://coexample.covisionmedia.com">nested sets driven vertical responsive menu</a>

## License
Released under the MIT license - https://opensource.org/licenses/MIT
