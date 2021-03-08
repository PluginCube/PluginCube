<?php
/**
 * Template Name: Support Page
 * Template Post Type: page
 *
 * @package PluginCube
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

<div class="container">
    <article <?php post_class("row d-flex justify-content-center")?>>
        <h1 class="archive-title">Support</h1>

        <div class="col-md-9">
            <form class="support-form" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <label for="name">Your Name</label>
                        <input id="name" type="text" name="name" required="required">
                    </div>

                    <div class="col-md-6">
                        <label for="email">Your Email</label>
                        <input id="email" type="email" name="email" required="required">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="topic">Topic</label>
                        
                        <select name="topic" id="topic" class="form-control" required="required">
                            <option value="technical_issues">Technical Issues</option>
                            <option value="account_billing">Account/Billing</option>
                            <option value="pre_sale_questions">Pre-Sale Question</option>
                            <option value="custom_development">Custom Development</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="product">Product</label>
                        
                        <select name="product" id="product" class="form-control" required="required">
                            <option>None</option>
                            <option value="supportbubble">SupportBubble</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label for="message">Your Message</label>
                        <textarea name="message" id="message" required="required"></textarea>
                    </div>
                </div>

                <?php wp_nonce_field('support_form'); ?>
                <input type="hidden" id="ajaxurl" value="<?= admin_url('admin-ajax.php') ?>">
                <button type="submit" name="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
    </article>
</div>
<?php get_footer(); ?>
