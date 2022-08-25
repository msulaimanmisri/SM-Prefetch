<?php function sm_prefetch_script()
{; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/quicklink/2.3.0/quicklink.umd.js"></script>

<script>
window.addEventListener('load', () => {
    quicklink.listen();
});
</script>

<?php }
add_action('get_footer', 'sm_prefetch_script', 1); ?>