<?php
    [
        'button_title_for_case_study_link' => $button_title_for_case_study_link,
        'testimonials' => $testimonials,
    ] = $fields;
?>

<div class="container">

    <?php if ($testimonials && !empty($testimonials)) { ?>
        <ul 
            class="testimonials"
            data-slider="testimonials"
        >
            <?php
                foreach ($testimonials as $index => $testimonial) {
                    [
                        'testimonial_text' => $testimonial_text,
                        'client_name_acf' => $client_name_acf,
                        'client_name' => $client_name,
                        'client_position' => $client_position,
                        'client_picture' => $client_picture,
                        'company_logo' => $company_logo,
                        'video_youtube_video_id' => $video_youtube_video_id,
                        'video_placeholder' => $video_placeholder,
                        'testimonial_type' => $testimonial_type,
                        'case_study' => $case_study,
                    ] = cb_get_testimonial_data($testimonial);
            ?>
                <li 
                    class="testimonial"
                    data-testimonial-type="<?= $testimonial_type; ?>"
                >
                    
                    <div class="text-content">
                        <div class="testimonial-text">
                            <?= $testimonial_text; ?>
                        </div>

                        <div class="testimonial-author">
                            <?php 
                                if ($client_picture) { 
                                    $client_picture_url = $client_picture['sizes']['medium'];
                            ?>
                                <div class="author-picture-wrapper">
                                    <img 
                                        class="author-picture" 
                                        src="<?= $client_picture_url; ?>" 
                                        alt="<?= $client_picture['title']; ?>"
                                    >
                                </div>
                            <?php } ?>

                            <div class="author-name">
                                <span class="name">
                                    <?= $client_name; ?>
                                </span>
                                <span class="position">
                                    <?= $client_position; ?>
                                </span>
                            </div>
                        </div>

                        <?php 
                            if ($case_study && $button_title_for_case_study_link) { 
                                $case_study_url = get_permalink($case_study);
                        ?>
                            <a 
                                class="testimonial-url" 
                                href="<?= $case_study_url; ?>"
                            >
                                <?= $button_title_for_case_study_link; ?>
                            </a>
                        <?php } ?>
                    </div>
                    
                    <?php if ($video_youtube_video_id) { ?>
                        <div class="video-content">
                            <img 
                                class="video-cover"
                                src="<?= $video_placeholder['url']; ?>" 
                                alt="<?= $video_placeholder['title']; ?>" 
                            >

                            <button 
                                class="testimonial-open-video js-modal-btn-<?= $index; ?>" 
                                data-video-id="<?= $video_youtube_video_id; ?>"
                                data-js="testimonial-open-video"
                            ></button>
                        </div>
                    <?php } ?>

                </li>
            <?php } ?>
        </ul>
    <?php } ?>

</div>