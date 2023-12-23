<?php
/*
 * Template Name: Custom Blocks
 * Template Post Type: post, page
 */

    $post = get_post();
    $content = apply_filters('the_content', get_the_content());
?>

<?php get_header(); ?>

<?php
    get_template_part(
        'template/pre-content-heder',
        null,
        [
            'title' => get_the_title()
        ],
    );
?>

<main class="cb-main">

    <?php 
        echo $content;
    ?>

</main>

<?php get_footer(); ?>