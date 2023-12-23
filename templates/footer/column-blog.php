<?php
    [
        'column_title' => $column_title,
    ] = $args['column'];

    $post_type_name = 'post';
    
    if (defined('RW_LNG')) {
        $post_type_name = 'post';
    } else if (defined('QW_LNG')) {
        $post_type_name = 'blog';
    }

    $lastest_blog_posts = get_posts([
        'numberposts' => 5,
        'post_type' => $post_type_name,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
        'fields' => 'ids'
    ]);

    $links = array_map(function($post_id) {
        return [
            'link' => [
                'title' => get_the_title($post_id),
                'url' => get_permalink($post_id),
            ]
        ];
    }, $lastest_blog_posts);
?>

<div class="column column-next">

    <?php if ($column_title) { ?>
        <h2 
            class="footer-column-heading"
            data-js="show-more"
            onclick="this.classList.toggle('active')"
        >
            <span>
                <?= $column_title ?>
            </span>
            <svg width="12" height="8">
                <use href="<?= CB_IMG_DIR; ?>/icons.svg#chevron-down"></use>
            </svg>
        </h2>
    <?php } ?>

    <?php if (!empty($links)) { ?>
        <ul class="footer-column-links">
            <?php foreach ($links as $index => $link) { ?>
                <?php
                    $url = $link['link']['url'];
                    $title = $link['link']['title'];
                    $new = $index < 2 ? 'new' : '';
                ?>
                <li class="footer-link-item <?= $new ?>">
                    <a 
                        class="footer-link" 
                        href="<?= $url ?>"
                    >
                        <?= $title ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    <?php } ?>

</div>