<div class="four columns sidebar-container">
    <aside class="sidebar">
        <section class="me">
            <header>
                <h1><?php _e('Alberto Varela Sánchez', Berriart::LANG_DOMAIN); ?></h1>
            </header>
            <div class="row">
                <div class="five columns">
                    <img width="120" height="120" src="<?php echo get_template_directory_uri() . '/images/alberto-varela.jpg'; ?>" alt="Alberto Varela" />
                </div>
                <div class="seven columns">
                    <p><?php _e('I live in <a rel="nofollow" href="https://maps.google.com/maps?hl=en&authuser=0&q=bilbao&ie=UTF-8&z=3">Bilbao</a> and I\'m a <a href="http://www.albertovarelasanchez.com/">Full Stack Web Developer</a> that is used to work with Symfony or Wordpress over LAMP platforms. If you want more info about me you can take a look at <a href="http://www.albertovarelasanchez.com/">my resume</a>.', Berriart::LANG_DOMAIN); ?></p>
                </div>
            </div>
        </section>
        <section class="search">
            <div class="row">
                <div class="twelve columns">
                    <form action="<?php echo icl_get_home_url(); ?>" method="get">
                        <div class="row collapse">
                            <div class="eight mobile-three columns">
                                <label class="hidden-label" for="s"><?php _e('Search for:', Berriart::LANG_DOMAIN); ?></label>
                                <input name="s" id="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr(__('Search for:', Berriart::LANG_DOMAIN)); ?>" type="text" />
                            </div>
                            <div class="four mobile-one columns">
                                <input type="submit" class="postfix button expand" value="<?php _e('Search', Berriart::LANG_DOMAIN); ?>" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <?php 
            // Get sponsors 

            $sponsorsPage = get_page_by_path('sponsors');
            $args = array(
                'post_parent' => $sponsorsPage->ID,
                'post_type'   => 'attachment', 
                'post_mime_type' => 'image',
                'numberposts' => -1,
            );
            $images = get_children($args);
            $sponsorArray = array();
            foreach($images as $image) {
                $sponsorArray[] = array(
                    'image' => wp_get_attachment_image( $image->ID, 'full', array(
                        'alt' => $image->post_title,
                        'title' => $image->post_title
                    ) ),
                    'url'   => $image->post_content
                );
            }
            $sponsorCount = count($sponsorArray);
            for($i=$sponsorCount;$i<3;$i++) {
                $sponsorArray[] = array(
                    'image' => '<img width="120" height="120" src="' . get_template_directory_uri() . '/images/advice-here.jpg" alt="Alberto Varela" />',
                    'url'   => '$image->post_content'
                );
            }
            ?>
            <section class="search">
                <div class="row">
                    <?php foreach($sponsorArray as $sponsor): ?>
                        <div class="four columns">
                            <a href="<?php echo $sponsor['url']; ?>"><?php echo $sponsor['image']; ?></a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </section>
    </aside>
</div>