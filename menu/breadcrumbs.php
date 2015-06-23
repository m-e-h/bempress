<?php
if (function_exists('breadcrumb_trail')) :

    breadcrumb_trail([
        'container'       => 'nav',
        'show_on_front'   => false,
        //'network'         => true,
        'show_browse'     => false,
    ]);

endif;
