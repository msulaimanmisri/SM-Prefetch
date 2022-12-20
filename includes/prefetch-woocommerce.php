<?php

/**
 * Prefetch Function.
 * First, load the Algorithm using CDN
 * Second, load the logic in WordPress
 */

function smPrefetch()
{
    if (!is_woocommerce() || !get_permalink(get_option('woocommerce_myaccount_page_id'))) {
        wp_enqueue_script('sm-prefetch-script-1', 'https://cdnjs.cloudflare.com/ajax/libs/quicklink/2.3.0/quicklink.umd.js', [], '', true);
        wp_enqueue_script('sm-prefetch-script-2', plugins_url('/script.js', __FILE__), [], '', true);
    }
}

/**
 * This function will remove all your WordPress JavaScript Versioning.
 * Why remove though? Because the downside having the version is bigger than keeping it.
 */
function removeJsVersion($src)
{
    if (strpos($src, '?ver=')) {
        $src = remove_query_arg('ver', $src);
    }

    return $src;
}

/**
 * Execute the Code
 */
add_action('wp_enqueue_scripts', 'smPrefetch', 99);
add_filter('script_loader_src', 'removeJsVersion', 99);