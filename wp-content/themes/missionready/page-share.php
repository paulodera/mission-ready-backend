<?php get_header(); ?>

<?php $intro = get_field('intro'); ?>
  
  <!--============ Banner Area Start ============-->
  <section class="inside-banner d-flex align-items-center" style="background-image:url('<?php bloginfo('template_directory'); ?>/images/banners/share-story.jpg');">
    <div class="container">
      <div class="row align-items-end">
        <div class="col-lg-6 col-md-12">
          <div class="back-btn"><a href="<?php echo get_site_url(); ?>"><i class="las la-long-arrow-alt-left" aria-hidden="true"></i> Back Home</a></div>
        </div>
      </div>
    </div>
  </section>
  <!--============ Banner Area End ============-->
  
  <main class="maincontent">
    <section class="share-form-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-12 mx-auto">
            <div class="share-form-text">
              <h2><?php echo $intro['title']; ?></h2>
              <p><?php the_content() ?></p>
              <form class="contact-form" method="post" action="" id="share-story" enctype="multipart/form-data">
                  <?php echo wp_nonce_field('my_nonce'); ?>
                  <input type="hidden" name="action" id="action" value="user_story">
                  <div class="messages"></div>
                  <div class="controls">
                    <div class="row gx-4">
                      <div class="col-md-12">
                        <div class="form-label-group">
                          <input id="username" type="text" name="username" class="form-control" placeholder="Your good name" required="required" data-error="First Name is required.">
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <!-- /column -->
                      <div class="col-md-12">
                        <div class="form-label-group">
                          <input id="useremail" type="email" name="useremail" class="form-control" placeholder="Email" required="required" data-error="Valid email is required.">
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <!-- /column -->
                      <div class="col-12">
                        <div class="form-label-group">
                          <textarea id="form_message" name="usermessage" class="form-control" placeholder="Your message" rows="5" required="required" data-error="Message is required."></textarea>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <!-- /column -->
                      <div class="col-md-12">
                        <div class="form-label-group fileupload fileupload-margin">
                          <label for="choosefile" class="form-label">Your feature image <small class="instruction">(4 mb of jpg/png file types only)</small></label>
                          <input class="form-control" type="file" name="userthumbnail" id="userthumbnail" accept="image/jpg, image/png, image/jpeg">
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-label-group fileupload fileupload-margin">
                          <label for="choosefile" class="form-label">Your video <small class="instruction">(10 mb of mp4 file type only)</small</label>
                          <input class="form-control" type="file" name="uservideo" id="uservideo" accept="video/mp4,video/x-m4v">
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <!-- /column -->
                      <div class="col-12 text-left">
                        <input type="submit" class="btn main-btn btn-send mb-3" value="Submit">
                      </div>
                      <!-- /column -->
                    </div>
                    <!-- /.row -->
                  </div>
                  <!-- /.controls -->
                </form>
                <!-- /form -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

<?php get_footer(); ?>

<script>
  $('#share-story').submit((e) => {
    e.preventDefault();
    let username = $('#username').val();
        useremail = $('#useremail').val();
        usermessage = $('#usermessage').val();
        _wpnonce = $('#_wpnonce').val();
    
    let fd = new FormData();
    fd.append('username', username);
    fd.append('useremail', useremail);
    fd.append('_wpnonce', _wpnonce);
    fd.append('action', "user_story")
    fd.append('usermessage', usermessage);
    fd.append('userthumbnail', $('input[type=file]')[0].files[0]);
    
    $.ajax({
      type: 'POST',
      url: "<?php echo admin_url('admin-ajax.php'); ?>",
      data: fd,
      /*data: {
        action: "user_story",
        username: username,
        useremail: useremail,
        userthumbnail: userthumbnail,
        usermessage: usermessage,
        _wpnonce: _wpnonce
      },*/
      contentType: false,
      processData: false,
      cache: false,
      success: function(response) {
        alert(success);

      }
    });
  });
</script>