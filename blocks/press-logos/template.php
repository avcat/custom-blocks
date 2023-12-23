<?php
    [
        'title' => $title,
        'logos_coloring' => $logos_coloring,
        'publications' => $publications,
    ] = $fields;
?>

<div class="container">

    <?php if ($title) { ?>
        <h2 class="title">
            <?= $title; ?>
        </h2>
    <?php } ?>

    <?php if (!empty($publications)) { ?>
        <ul 
            class="publications"
            data-coloring="<?= $logos_coloring; ?>"
        >
            <?php foreach ($publications as $publication) { 
                [
                    'publisher' => $publisher,
                    'link' => $link,
                ] = $publication;

                $publisher_thumbnail_url = get_the_post_thumbnail_url($publisher, [200, 200]);
                $publisher_name = $publisher->post_title;
                $publisher_name = $publisher->post_title;

                if ($link) {
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                }
                
                if ($publisher_thumbnail_url) {
            ?>
                <li class="publication">
                    <a 
                        class="publication-link"
                        href="<?= $link_url; ?>"
                        target="_blank"
                    >
                        <img 
                            class="publisher-logo" 
                            src="<?= $publisher_thumbnail_url; ?>" 
                            alt="<?= $publisher_name; ?>"
                        >
                    </a>
                </li>
            <?php }} ?>
        </ul>
    <?php } ?>

</div>