            </div>

            <?php get_sidebar(); ?>
        </div>
    </div>	
    <footer id="footer">
        <div class="row social-icons">
            <div class="two columns">
                <a class="has-tip tip-top" data-width="210" title="I'm @artberri on Twitter. I twit in spanish the most time, sharing proffesional stuff and personal opinions" href="http://twitter.com/artberri" rel="me" title="<?php _e('Twitter', Berriart::LANG_DOMAIN); ?>"><i class="icon foundicon-twitter"></i></a>
            </div>
            <div class="two columns">
                <a class="has-tip tip-top" data-width="210" title="If you want to connect with me profesionally, you can use LinkedIn" href="http://linkedin.com/in/artberri" rel="me" title="<?php _e('LinkedIn', Berriart::LANG_DOMAIN); ?>"><i class="icon foundicon-linkedin"></i></a>
            </div>
            <div class="two columns">
                <a class="has-tip tip-top" data-width="210" title="I have a part of my code hosted on GitHub, you can clone it!"  href="http://github.com/artberri" rel="me" title="<?php _e('Github', Berriart::LANG_DOMAIN); ?>"><i class="icon foundicon-github"></i></a>
            </div>
            <div class="two columns">
                <a class="has-tip tip-top" data-width="210" title="One of my favourite hobbies is the photography, cheack all my photos at Flickr" href="http://www.flickr.com/photos/artberri/" rel="me" title="<?php _e('Flickr', Berriart::LANG_DOMAIN); ?>"><i class="icon foundicon-flickr"></i></a>
            </div>
            <div class="two columns">
                <a class="has-tip tip-top" data-width="210" title="I use Facebook as a personal Social Network, I prefer that you contact me using any other method unless you know me personally" href="#footer" rel="me" title="<?php _e('Facebook', Berriart::LANG_DOMAIN); ?>"><i class="icon foundicon-facebook"></i></a>
            </div>
            <div class="two columns">
                <a class="has-tip tip-top" data-width="210" title="Follow this blog usintg its feed" href="<?php bloginfo('rss_url'); ?>" title="<?php _e('Blog feed', Berriart::LANG_DOMAIN); ?>"><i class="icon foundicon-rss"></i></a>
            </div>
        </div>
        <div class="row">
            <div class="twelve columns">
                <p class="copy"><?php _e('Copyright © 2005-2012 Alberto Varela | Licensed under <a href="http://creativecommons.org/licenses/by-nc-sa/3.0/" rel="nofollow">CC</a> | Only free software was used and no kitties were harmed in the making of this website', Berriart::LANG_DOMAIN); ?></p>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>
