<?php get_header(); ?>
    <div class="container">
        <h1 class="archive-title">
            <?php
                if( is_home() ) {
                    echo 'Latest Posts';
                } elseif ( is_search() ) {
                    echo 'Search Results';
                } elseif ( is_post_type_archive('product') ) {
                    echo 'Latest Product';
                } else {
                    the_archive_title('', '');
                }
            ?>
        </h1>

        <div class="row d-flex flex-wrap align-items-stretch">
            <?php
                if ( isset($_GET['post_type']) ) {
                    set_query_var('post_type', $_GET['post_type']);
                }

                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();

                        $type = get_post_type();

                        include get_template_directory() . '/inc/partials/content/list/single.php';
                    }
                }
            ?>
        </div>

        <div class="row d-flex flex-wrap align-items-center mt-6">
            <div class="col-6">
                <!-- breadcrumbs here -->
            </div>
        </div>

    </div>
<?php get_footer(); ?>
