<?php

require_once('FirePHPCore/FirePHP.class.php');
ob_start();
$firephp = FirePHP::getInstance(true);


//debug show what template is being used
add_action('wp_footer', 'show_template');
function show_template() {
    global $template;
    print_r($template);
}
