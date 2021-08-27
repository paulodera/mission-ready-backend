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
              <form class="contact-form" method="post" action="php/contact.php">
                  <div class="messages"></div>
                  <div class="controls">
                    <div class="row gx-4">
                      <div class="col-md-12">
                        <div class="form-label-group">
                          <input id="form_name" type="text" name="name" class="form-control" placeholder="Name" required="required" data-error="First Name is required.">
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <!-- /column -->
                      <div class="col-md-12">
                        <div class="form-label-group">
                          <input id="form_email" type="email" name="email" class="form-control" placeholder="Email" required="required" data-error="Valid email is required.">
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <!-- /column -->
                      <div class="col-12">
                        <div class="form-label-group">
                          <textarea id="form_message" name="message" class="form-control" placeholder="Your message" rows="5" required="required" data-error="Message is required."></textarea>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <!-- /column -->
                      <div class="col-md-12">
                        <div class="form-label-group fileupload fileupload-margin">
                          <label for="choosefile" class="form-label">File Upload</label>
                          <input class="form-control" type="file" id="choosefile" multiple>
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