<?php
/*
 * Template Name: Contact
 */

include 'vendors/recaptchalib.php';

if(isset($_POST['_contact_nonce']) && wp_verify_nonce($_POST['_contact_nonce'], basename(__FILE__))) {
    
    // Check captcha
    $resp = recaptcha_check_answer (RECAPTCHA_PRIVATE_KEY,
            $_SERVER["REMOTE_ADDR"],
            $_POST["recaptcha_challenge_field"],
            $_POST["recaptcha_response_field"]);

    if (!$resp->is_valid) {
      // What happens when the CAPTCHA was entered incorrectly
      die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
           "(reCAPTCHA said: " . $resp->error . ")");
    } 
    else {
      // Your code here to handle a successful verification
    }
}

get_header(); ?>
<script type="text/javascript">
var RecaptchaOptions = {
    theme : 'clean'
};
</script>
<div class="main">

    <?php if ( have_posts() ) : ?>

        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <?php the_content(); ?>
                        <form action="<?php the_permalink(); ?>" method="POST">
                            <div class="row">
                                <div class="two mobile-one columns">
                                    <label for="contactName" class="right inline"><?php _e('Name:', Berriart::LANG_DOMAIN); ?></label>
                                </div>
                                <div class="ten mobile-three columns">
                                    <input id="contactName" name="contact[name]" required type="text" placeholder="<?php esc_attr_e('Your name', Berriart::LANG_DOMAIN); ?>" class="eight" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="two mobile-one columns">
                                    <label for="contactEmail" class="right inline"><?php _e('Email:', Berriart::LANG_DOMAIN); ?></label>
                                </div>
                                <div class="ten mobile-three columns">
                                    <input id="contactEmail" name="contact[email]" required type="email" placeholder="<?php esc_attr_e('Your email', Berriart::LANG_DOMAIN); ?>" class="error eight" />
                                    <small class="error eight">Invalid entry</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="two mobile-one columns">
                                    <label for="contactUrl" class="right inline"><?php _e('Website:', Berriart::LANG_DOMAIN); ?></label>
                                </div>
                                <div class="ten mobile-three columns">
                                    <input id="contactUrl" name="contact[url]" type="url" placeholder="<?php esc_attr_e('Your URL (optional)', Berriart::LANG_DOMAIN); ?>" class="eight" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="two mobile-one columns">
                                    <label for="contactSubject" class="right inline"><?php _e('Subject:', Berriart::LANG_DOMAIN); ?></label>
                                </div>
                                <div class="ten mobile-three columns">
                                    <input id="contactSubject" name="contact[subject]" required type="text" placeholder="<?php esc_attr_e('Subject of the message', Berriart::LANG_DOMAIN); ?>" class="eight" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="two mobile-one columns">
                                    <label for="contactMessage" class="right inline"><?php _e('Message:', Berriart::LANG_DOMAIN); ?></label>
                                </div>
                                <div class="ten mobile-three columns">
                                    <textarea id="contactMessage" name="contact[message]" required class="eight"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="two mobile-one columns"></div>
                                <div class="ten mobile-three columns">
                                    <?php echo recaptcha_get_html(RECAPTCHA_PUBLIC_KEY); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="two mobile-one columns"></div>
                                <div class="ten mobile-three columns">
                                    <input type="submit" class="medium radius button" value="<?php esc_attr_e('Send', Berriart::LANG_DOMAIN); ?>" />
                                </div>
                            </div>
                            <?php wp_nonce_field(basename(__FILE__), '_contact_nonce') ?>
                        </form>
                    </div><!-- .entry-content -->
            </article><!-- #post-<?php the_ID(); ?> -->

        <?php endwhile; ?>

    <?php else : ?>

        <article id="post-0" class="post no-results not-found">
                <header class="entry-header">
                        <h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
                </header><!-- .entry-header -->

                <div class="entry-content">
                        <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
                        <?php get_search_form(); ?>
                </div><!-- .entry-content -->
        </article><!-- #post-0 -->

    <?php endif; ?>

</div>
<?php get_footer(); ?>
