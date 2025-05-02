<?php
    /*
    * Template Name: Custom Blocks
    */

    $post = get_post();
    $content = apply_filters('the_content', get_the_content());
?>

<?php get_header(); ?>

<main class="cb-main">
    <?= $content ?>
</main>

<?php get_footer(); ?>