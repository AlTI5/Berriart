<?php 
global $berriart;

get_header(); ?>
<div class="main">

    <?php if ( have_posts() ) : ?>

        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

                        <?php if ( 'post' == get_post_type() ) : ?>
                            <div class="entry-meta">
                                    <?php $berriart->postedOn(); ?>
                            </div><!-- .entry-meta -->
                        <?php endif; ?>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                            <?php the_content(); ?>
                            <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', Berriart::LANG_DOMAIN ) . '</span>', 'after' => '</div>' ) ); ?>
                    </div><!-- .entry-content -->

                    <footer class="entry-meta">
                        <?php
                            /* translators: used between list items, there is a space after the comma */
                            $categories_list = get_the_category_list( __( ', ', Berriart::LANG_DOMAIN ) );

                            /* translators: used between list items, there is a space after the comma */
                            $tag_list = get_the_tag_list( '', __( ', ', Berriart::LANG_DOMAIN ) );
                            if ( '' != $tag_list ) {
                                    $utility_text = __( 'This entry was posted in %1$s and tagged %2$s.', Berriart::LANG_DOMAIN );
                            } elseif ( '' != $categories_list ) {
                                    $utility_text = __( 'This entry was posted in %1$s.', Berriart::LANG_DOMAIN );
                            } 

                            printf(
                                    $utility_text,
                                    $categories_list,
                                    $tag_list
                            );
                        ?>
                        <?php edit_post_link( __( 'Edit', Berriart::LANG_DOMAIN ), '<span class="edit-link">', '</span>' ); ?>
                    </footer><!-- .entry-meta -->
            </article><!-- #post-<?php the_ID(); ?> -->

        <?php endwhile; ?>
        <nav class="pagination-container">
            <?php $berriart->pagination(); ?>
        </nav>

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
