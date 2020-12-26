<?php

use Illuminate\Support\Facades\Cookie;

function isMobile() : bool {
    $display_type = Cookie::get('display_type');

    if ($display_type !== null) {
        return $display_type === 'mobile';
    } else {
        return  true;
    }
}

?>
