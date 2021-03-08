<?php get_header(); ?>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <article <?php post_class("single col-md-8") ?>>
                <?php the_title('<h1>' , '</h1>') ?>

                <div class="post-content">
                    <?php the_content() ?>
                </div>
            </article>
        </div>
    </div>
<?php get_footer(); ?>
