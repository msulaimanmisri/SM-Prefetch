<?php function sm_prefetch_script()
{; ?>

    <script src="<?php echo plugin_dir_url(__DIR__) . '/node_modules/quicklink/dist/quicklink.umd.js'; ?>"></script>

    <script>
        window.addEventListener('load', () => {
            quicklink.listen();
        });
    </script>

<?php }
add_action('get_footer', 'sm_prefetch_script'); ?>