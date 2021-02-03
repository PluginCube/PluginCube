</main>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <aside class="col-md">
                <h4 class="footer-logo">Plugin<span>Cube</span></h4>
                <p class="rights">© 2020 All Rights Reserved.</p>
            </aside>

            <aside class="col-md">
                <?php dynamic_sidebar('footer-first') ?>
            </aside>

            <aside class="col-md">
                <?php dynamic_sidebar('footer-second') ?>
            </aside>

            <aside class="col-md">
                <div class="highlighted-widget">
                    <h5>Subscribe</h5>

                    <p>Get the latest new and discounts.</p>

                    <form>
                        <input type="email" placeholder="Email">
                        <button type="submit" class="small">Submit</button>
                    </form>
                </div>
            </aside>
        </div>
    </div>
</footer>

<!-- Scripts -->
<?php wp_footer(); ?>
</body>
</html>
