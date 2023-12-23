<?php
    [
        'subtitle' => $subtitle,
        'case_study_press' => $case_study_press,
    ] = $fields;

    $max_related_articles = 0;
    foreach ($case_study_press as $case_study) {
        $related_articles_amount = count($case_study['related_articles']);
        if ($related_articles_amount > $max_related_articles) {
            $max_related_articles = $related_articles_amount;
        }
    }
?>

<?php if ($subtitle) { ?>
    <div class="subtitle">
        <?= $subtitle; ?>
    </div>
<?php } ?>

<?php if (!empty($case_study_press)) { ?>
    <div 
        class="case-study-press-wrapper"
        title="[Shift + Mousewheel] for horizontal scrolling"
    >
        <div class="case-study-press">

            <?php foreach ($case_study_press as $case_study) { ?>
                <?php
                    [
                        'case_study' => $case_study,
                        'case_study_description' => $case_study_description,
                        'related_articles' => $related_articles,
                    ] = $case_study;
                ?>

                <?php
                    $case_study_id = $case_study->ID;
                    $case_study_title = $case_study->post_title;
                    $case_study_url = get_permalink($case_study);
                    $case_study_logo = get_field('cs_logo', $case_study_id);
                    if ($case_study_logo) {
                        $case_study_logo_url = $case_study_logo['url'];
                    }
                ?>
                    <div class="case-study">

                        <?php if ($case_study_logo_url) { ?>
                            <a
                                class="case-study-link"
                                href="<?= $case_study_url; ?>"
                            >
                                <img
                                    class="case-study-logo"
                                    src="<?= $case_study_logo_url; ?>"
                                    alt="<?= $case_study_title; ?>"
                                >
                            </a>
                        <?php } ?>

                        <?php if ($case_study_description) { ?>
                            <div class="case-study-description">
                                <?= $case_study_description; ?>
                            </div>
                        <?php } ?>

                    </div>

                    <ul class="case-study-articles">
                        <?php foreach ($related_articles as $index => $related_article) { ?>
                            <?php
                                [
                                    'article_link' => $article_link,
                                    'publisher' => $publisher,
                                ] = $related_article;
                                if ($article_link) {
                                    $article_url = $article_link['url'];
                                }
                                if (gettype($publisher) === 'integer') {
                                    $publisher = get_post($publisher);
                                }
                                $publisher_title = $publisher->post_title;
                                $publisher_description = $publisher->post_content;
                                $publisher_logo_url = get_the_post_thumbnail_url($publisher);
                            ?>
                            <li 
                                class="related-article"
                                <?php if ($index + 1 === $max_related_articles) { ?>
                                    data-last-article=""
                                <?php } ?>
                            >
                                <?php if ($publisher_logo_url && $article_url) { ?>
                                    <a
                                        class="publisher-link"
                                        href="<?= $article_url; ?>"
                                        target="_blank"
                                    >
                                        <img
                                            class="publisher-logo"
                                            src="<?= $publisher_logo_url; ?>"
                                            alt="<?= $publisher_title; ?>"
                                        >
                                    </a>
                                <?php } ?>

                                <?php if ($publisher_description || $article_url) { ?>
                                    <div class="publisher-info">
                                        <?php if ($publisher_description) { ?>
                                            <div class="publisher-description">
                                                <?= $publisher_description; ?>
                                            </div>
                                        <?php } ?>

                                        <?php if ($article_url) { ?>
                                            <a
                                                class="btn publisher-article"
                                                href="<?= $article_url; ?>"
                                                target="_blank"
                                            >
                                                <?= __('Read Article'); ?>
                                            </a>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                                
                            </li>
                        <?php } ?>
                    </ul>
            <?php } ?>
            
        </div>
    </div>
<?php } ?>