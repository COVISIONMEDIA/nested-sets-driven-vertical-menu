/*!
 * jQuery lightweight plugin boilerplate
 * Original author: @ajpiano
 * Further changes, comments: @addyosmani
 * Licensed under the MIT license
 * @link http://coding.smashingmagazine.com/2011/10/11/essential-jquery-plugin-patterns/
 */

// the semi-colon before the function invocation is a safety
// net against concatenated scripts and/or other plugins
// that are not closed properly.
;(function ( $, window, document, undefined ) {

    // undefined is used here as the undefined global
    // variable in ECMAScript 3 and is mutable (i.e. it can
    // be changed by someone else). undefined isn't really
    // being passed in so we can ensure that its value is
    // truly undefined. In ES5, undefined can no longer be
    // modified.

    // window and document are passed through as local
    // variables rather than as globals, because this (slightly)
    // quickens the resolution process and can be more
    // efficiently minified (especially when both are
    // regularly referenced in your plugin).

    // Create the defaults once
    var pluginName = 'verticalMenu',
        defaults = {
            propertyName: ""
        };

    // The actual plugin constructor
    function Plugin( element, options ) {
        this.element = element;

        // jQuery has an extend method that merges the
        // contents of two or more objects, storing the
        // result in the first object. The first object
        // is generally empty because we don't want to alter
        // the default options for future instances of the plugin
        this.options = $.extend( {}, defaults, options) ;

        this._defaults = {

            vertical_menu: {

                current_menu_id: 0,
                show_drop_icon_on_width: 991

            }
        }
        this._name = pluginName;

        this.init();
    }

    Plugin.prototype.init = function () {
        // Place initialization logic here
        // You already have access to the DOM element and
        // the options via the instance, e.g. this.element
        // and this.options

        $.ajax({ //make ajax request to cart_process.php
            url: "./ajax/leaveOpen.php",
            type: "POST",
            dataType: "json",
            data: {id : this.options.vertical_menu.current_menu_id }
        }).done(function(data){ //on Ajax success
            
            $.each(data.items, function(i, item) {
                $('#cssmenu .menu_' + i).addClass('open_menu'); //please note that .menu_' + i is mandatory
            });

        });





        var width_of_window = $( window ).width();

        if(width_of_window <= this.options.vertical_menu.show_drop_icon_on_width) {

            var links = $('#cssmenu li');

            $.each(links, function(i, link) {

                if($(link).children("ul").length > 0) {

                    $(link).append('<div class="menuArrow"><i class="down down-lines"></i></div>');
                }
            });

            $('#cssmenu').on('click', '.menuArrow', function(e) {

                $(this).parent().find(' > ul').show('slow');


            });


        }


    };






    // A really lightweight plugin wrapper around the constructor,
    // preventing against multiple instantiations
    $.fn[pluginName] = function ( options ) {
        return this.each(function () {
            if (!$.data(this, 'plugin_' + pluginName)) {
                $.data(this, 'plugin_' + pluginName,
                new Plugin( this, options ));
            }
        });
    }

})( jQuery, window, document );
