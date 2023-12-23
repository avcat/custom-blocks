<?php
    [
        'sorting' => $sorting,
    ] = $fields;

    $args = [
        'posts_per_page' => -1,
        'post_type' => 'press',
    ];

    if ($sorting === 'article_publish_date') {
        $args = array_merge(
            $args,
            [
                'orderby' => 'meta_value',
                'meta_key' => 'article_publish_date',
                'order' => 'DESC',
            ]
        );
    }

    $press_posts = get_posts($args);
?>

<div class="container">

    <?php if (!empty($press_posts)) { ?>
        <div class="press-posts">
            <?php foreach ($press_posts as $post) { 
                $post_id = $post->ID;
                $thumbnail_url = get_the_post_thumbnail_url($post, [366, 275]);
                $title = $post->post_title;
                $link_to_the_article = get_field('link_to_the_article', $post_id);
                if ($link_to_the_article) {
                    $article_url = $link_to_the_article['url'];
                }
                $publisher_id = get_field('press_publisher', $post_id);
                if ($publisher_id) {
                    $publisher_thumbnail_url = get_the_post_thumbnail_url($publisher_id, [200, 200]);
                }
                $article_publish_date = get_field('article_publish_date', $post_id);
            ?>
                <article class="press-post">

                    <a 
                        class="link-thumbnail"
                        href="<?= $article_url; ?>"
                        target="_blank"
                    >
                        <img 
                            class="thumbnail-image" 
                            src="<?= $thumbnail_url; ?>" 
                            alt="<?= $title; ?>"
                        >
                    </a>

                    <a 
                        class="link-title" 
                        href="<?= $article_url; ?>"
                        target="_blank"
                    >
                        <h2 
                            class="title"
                            data-clamp-lines="2"
                        >
                            <?= $title; ?>
                        </h2>
                    </a>

                    <footer class="card-footer">
                        <?php if ($publisher_thumbnail_url) { ?>
                            <div class="publisher-logo-wrapper">
                                <img 
                                    class="publisher-logo"
                                    src="<?= $publisher_thumbnail_url; ?>" 
                                    alt="Publisher Logo"
                                >
                            </div>
                        <?php } ?>

                        <?php if ($article_publish_date) { ?>
                            <time class="publish-date">
                                <svg width="18" height="24">
                                    <use href="<?= CB_IMG_DIR; ?>/icons.svg#calendar"></use>
                                </svg>
                                <span>
                                    <?= $article_publish_date; ?>
                                </span>
                            </time>
                        <?php } ?>
                    </footer>

                </article>
            <?php } ?>
        </div>
    <?php } ?>

</div>