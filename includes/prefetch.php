<?php

/**
 * Prefetch Function.
 * First, load the Algorithm using CDN
 * Second, load the logic in WordPress
 */
function smPrefetch()
{
    wp_enqueue_script('sm-prefetch-script-1', 'https://cdnjs.cloudflare.com/ajax/libs/quicklink/2.3.0/quicklink.umd.js', [], '', true);
    wp_enqueue_script('sm-prefetch-script-2', plugins_url('/script.js', __FILE__), [], '', true);
}

/**
 * This function will remove all your WordPress JavaScript Versioning.
 * Why remove though? Because the downside having the version is bigger than keeping it.
 */
function removeJsVersion($src)
{
    if (strpos($src, '?ver='))
        $src = remove_query_arg('ver', $src);
    return $src;
}

/**
 * Now we execute the Code
 */
add_action('get_footer', 'smPrefetch', 999);
add_filter('script_loader_src', 'removeJsVersion', 999);