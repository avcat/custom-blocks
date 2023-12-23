<?php
    [
        'title' => $title,
        'testimonials' => $testimonials,
        'contact_form_id' => $contact_form_id,
    ] = $fields;
?>

<div class="container">

    <?php if ($title) { ?>
        <h2 class="title">
            <?= $title; ?>
        </h2>
    <?php } ?>

    <?php if ($contact_form_id) { ?>
        <div class="contact-form">
            <?= do_shortcode('[quform id="' . $contact_form_id . '"]'); ?>
        </div>
    <?php } ?>

    <?php if (!empty($testimonials)) { ?>
        <ul 
            class="testimonials" 
            data-slider="contact-testimonials"
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
                <li class="testimonial">

                    <?php if ($company_logo) { ?>
                        <img class="company-logo" src="<?= $company_logo['url']; ?>" alt="<?= $company_logo['title']; ?>">
                    <?php } ?>

                    <div class="testimonial-text">
                        <?= $testimonial_text; ?>
                    </div>

                    <div class="testimonial-author">
                        <?= $client_name; ?>, <?= $client_position; ?>
                    </div>

                    <?php if ($video_youtube_video_id) { ?>
                        <button 
                            class="testimonial-open-video js-modal-btn-<?= $index; ?>" 
                            data-video-id="<?= $video_youtube_video_id; ?>"
                            data-js="contact-testimonial-open-video"
                        ></button>
                    <?php } ?>

                </li>
            <?php } ?>

        </ul>
    <?php } ?>

</div>