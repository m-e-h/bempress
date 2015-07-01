<?php

if (function_exists('breadcrumb_trail')) :

    breadcrumb_trail([
        'container'     => 'nav',
        'show_on_front' => false,
        'show_browse'   => false,
        //'network'         => true,
    ]);

endif;
