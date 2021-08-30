<section class="subscribearea">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 mx-auto">
                <div class="subscribeinfo text-center">
                    <h3>Ready to Bring Your A Game?</h3>
                    <p>Sign up today to be in the know</p>
                </div>
                <div class="subscribe-form" id="subscribe-form">
                    <form class="newsletter-form" method="post" action="" data-toggle="validator" id="newsletter">
                        <?php wp_nonce_field('my_nonce'); ?>
                        <input type="email" name="subscriber" id="subscriber" class="input-newsletter" placeholder="Enter your email address" name="EMAIL" required autocomplete="off">
                        <i class="far fa-envelope"></i>
                        <button type="submit" id="subscribe-btn">Get Started</button>
                        <div id="validator-newsletter" class="form-result"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="topfooter bg-grey">
    <div class="container-lg">
        <div class="row">
            <div class="col-md-12">
                <div class="footermenu">
                    <ul>
                    <?php
                      $cpi = get_the_id();
                      $locations = get_nav_menu_locations();
                      $menu_id = $locations['footer'];
                      $nav_items = wp_get_nav_menu_items($menu_id);

                      foreach( $nav_items as $nav):
                        $current_menu = $nav->object_id;
                    ?>

                        <li><a href="<?php echo $nav->url; ?>"><?php echo $nav->title; ?></a></li>

                    <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<footer class="footer">
    <div class="safaricom-footer"> <img src="<?php bloginfo('template_directory')?>/images/footer.png" alt="Safaricom"> </div>
</footer>
</div>

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js" type="text/Javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/main.js" type="text/Javascript"></script>
<script>
    $('#newsletter').submit((e) => {
        e.preventDefault();
        let subscriber = $('#subscriber').val();
        let _wpnonce = $('#_wpnonce').val();

        $.ajax({
            type: 'POST',
            url: "<?php echo admin_url('admin-ajax.php'); ?>",
            data: {
                action: "user_subscribe",
                subscriber: subscriber,
                name: name,
                _wpnonce: _wpnonce
            },
            dataType: 'html', // data return type is html
            cache: false,
            beforeSubmit: () => {
                $("#subscribe-btn").attr('disabled', 'disabled');
            },
            success: (res) => {
                $('#subscribe-form').html(res);
            }
        })
        
    })
</script>

<?php wp_footer(); ?>

</body>

</html>