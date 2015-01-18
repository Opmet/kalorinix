<?php
/**
 * The idea is to assemble all PHP and Javascrip config variables in this file.
 *
 * @see http://stackoverflow.com/questions/5310216/passing-php-variable-into-javascript
 * @see http://stackoverflow.com/questions/881515/how-do-i-declare-a-namespace-in-javascript
 * @author Joakim Andersson <joakim@itandersson.se>
 * @copyright Joakim Andersson 2014-11-08
 */

    //PHP config constants.
    define('PLUGIN_PATH', '' . plugins_url() );
    define('CREATE_WIDGET_PATH', PLUGIN_PATH . '/kalorinix/create-widget');
    define('MYSEARCH_WIDGET_PATH', PLUGIN_PATH . '/kalorinix/mysearch-widget');
    define('OWN_WIDGET_PATH', PLUGIN_PATH . '/kalorinix/own-widget');

?>

<script type="text/javascript">
/**
 * Javascripts globals.
 * Javascript object that is available throughout the program.
 * To get the value:
 * var value = jsGlobals.createWidget;
*/


    // Javascript config lobal scope object.
    var jsGlobals = {
    	    'createWidget' : '<?php echo CREATE_WIDGET_PATH; ?>',
    	    'mysearchWidget' : '<?php echo MYSEARCH_WIDGET_PATH; ?>',
    	    'ownWidget' : '<?php echo OWN_WIDGET_PATH; ?>'
    };
    
</script>