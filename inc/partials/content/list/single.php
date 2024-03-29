<article class="col-md-4 mb-4">
    <div class="card">
        <?php if ( get_post_type() == 'post' ) : ?>
            <div class="d-flex justify-content-between align-items-center">
                <a href="<?= get_term_link(get_the_category()[0]) ?? null ?>" class="text-muted font-weight-bold"><?= get_the_category()[0]->name ?? null ?></a>
                <span class="text-muted text-capitalize"><?php echo esc_html( human_time_diff( get_the_time('U'), current_time('timestamp') ) ) . ' ago'; ?></span>
            </div>
        <?php endif; ?>

        <h2 class="h3 mt-5">
            <a href="<?= get_permalink() ?>"><?= get_the_title() ?></a>
        </h2>

        <p class="mb-5">
            <?php echo get_the_excerpt() ?>
        </p>

        <div class="d-flex justify-content-between align-items-center">
            <div class="author-box d-sm-flex flex-row flex-wrap align-items-center">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 43, false, get_the_title(), [
                    'class' => 'img-sm rounded-circle'
                ]); ?>

                <div class="px-3">
                    <h6 class="m-0"><?php echo the_author_posts_link(); ?></h6>
                    <small class="mb-1">Editor</small>
                </div>
            </div>

            <span href="#" class="text-danger py-1 px-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="14" fill="currentColor">
                    <path fill="none" d="M0 0h24v24H0z"/>
                    <path d="M7.291 20.824L2 22l1.176-5.291A9.956 9.956 0 0 1 2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.956 9.956 0 0 1-4.709-1.176z"/>
                </svg>

                <span><?= get_comments_number() ?></span>
            </a>
        </div>
    </div>
</article>