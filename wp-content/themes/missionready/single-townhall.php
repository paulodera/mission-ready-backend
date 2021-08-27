<?php get_header(); ?>
  
  <main class="maincontent">
    <section class="share-form-area">
      <div class="container">
      <div class="row align-items-end">
        <div class="col-lg-6 col-md-12">
          <div class="back-btn"><a href="<?php echo home_url(); ?>"><i class="las la-long-arrow-alt-left" aria-hidden="true"></i> Back Home</a></div>
        </div>
      </div>
    </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-10 col-md-12 mx-auto">
            <div class="videoarea">
              <h2><?php the_title(); ?></h2>
            <video controls width="100%">
              <source src="<?php echo get_field('video'); ?>">
            </video>
            <!-- <canvas></canvas> -->
            <p><?php the_content(); ?></p>
          </div>
          <div class="row">
            <!-- Like Area-->
            <div class="col-6">
                <div class='like-wrapper'>
                  <button title="Love" data-stat="loves" class="loves heart-button"><svg viewBox="-2 0 105 92" class="LoveButtonIcon-module_root-3dw_B" data-love-level="3"><path d="M85.24 2.67C72.29-3.08 55.75 2.67 50 14.9 44.25 2 27-3.8 14.76 2.67 1.1 9.14-5.37 25 5.42 44.38 13.33 58 27 68.11 50 86.81 73.73 68.11 87.39 58 94.58 44.38c10.79-18.7 4.32-35.24-9.34-41.71z"></path></svg><span class="screen-reader-text">Likes</span><span>2</span></button>
                </div>
            </div>
            <!-- Share Area-->
            <div class="col-6">
            <div class="share">
            <p class="noSelect">Share <i class="fas fa-share-alt"></i></p>
            <ul class="socialshare">
              <li><a href="#"><i class="far fa-envelope"></i> Facebook</a></li>
              <li><a href="#"><i class="fab fa-whatsapp"></i> WhatsApp</a></li>
              <li><a href="#"><i class="far fa-envelope"></i> Instagram</a></li>
            </ul>
          </div>
            </div>
          </div>
          </div>
          <div class="col-lg-8 col-md-12 mx-auto">
            <div class="share-form-text">
              <h3>Conversation</h3>
              <button class="btnfeedback">Click  to comment</button>
              <form class="contact-form insidefeedback" method="post" action="php/contact.php">
                  <div class="messages"></div>
                  <div class="controls">
                    <div class="row gx-4">
                      <!-- /column -->
                      <div class="col-md-12">
                        <div class="form-label-group fileupload">
                          <label for="choosefile" class="form-label">File Upload</label>
                          <input class="form-control" type="file" id="choosefile" multiple>
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

            <section class="item-content">
                <div class="post-meta">
                  <div class="postedinfo"> <span class="time-posted">
                    <time>16th May 2021</time>
                    </span> </div>
                  <!-- <div class="top-entry-meta">
                    <div class="divider-30"></div>
                    </div> -->
                    <div class="entryBlock">
                    <div class="author-ava"> 
                      <span class="author vcard"> <span class="avatar">JD</span> <a href="#">sabi</a> </span> 
                    </div> 
                  <div class="entry-content">
                    <h3>John Doe</h3>
                    <p>Agile has worked wonders for the team. Work flows are streamlined and productivity is at an all time high Agile has worked wonders for the team. Work flows are streamlined and productivity is at an all time high</p>
                  </div>
                </div>
                  
                  <!-- .entry-content -->
                  <div class="entry-meta">
                    <div class="divider-30"></div>
                    <ul class="calltoactions">
                      <li><span class="views"> <i class="far fa-heart"></i> <span class="item-views-count">7k Likes</span></span></li>
                      <li><a href="#"> <span class="views"><i class="las la-comment-dots"></i> <span class="item-views-count">5 comments</span></span></a> </li>
                      <li> <span class="views"><i class="fas fa-reply"></i> <span class="item-views-count">Reply</span> </span></li>
                    </ul>
                  </div>
                </div>
                <div class="coment-area">
                  <ul class="we-comet">
                    <li class="post-comment">
                      <div class="post-comt-box">
                        <form method="post">
                          <input id="form_email" type="text" name="text" class="form-control" placeholder="Name" required="required" data-error="Valid name is required.">
                          <textarea placeholder="Post your comment"></textarea>
                          <button type="submit">Submit</button>
                        </form>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="entry-comments">
                  <div class="replyblock">
                    <div class="top-entry-meta">
                      <div class="author-ava"> 
                      <span class="author vcard"> <span class="avatar">S</span> <a href="#">sabi</a> </span> 
                    </div> 
                    </div>
                    <div class="entry-content">
                      <div class="divider-30"></div>
                      <h3>John Doe</h3>
                      <p>“Agile has worked wonders for the team. Work flows are streamlined and productivity is at an all time high”</p>
                    </div>
                  </div>
                </div>
              </section>
              <!-- .item-content -->

              <section class="item-content">
                <div class="post-meta">
                  <div class="postedinfo"> <span class="time-posted">
                    <time>16th May 2021</time>
                    </span> </div>
                  <!-- <div class="top-entry-meta">
                    <div class="divider-30"></div>
                    </div> -->
                    <div class="entryBlock">
                    <div class="author-ava"> 
                      <span class="author vcard"> <span class="avatar">S</span> <a href="#">sabi</a> </span> 
                    </div> 
                  <div class="entry-content">
                    <h3>John Doe</h3>
                    <p>Agile has worked wonders for the team. Work flows are streamlined and productivity is at an all time high Agile has worked wonders for the team. Work flows are streamlined and productivity is at an all time high</p>
                  </div>
                </div>
                  
                  <!-- .entry-content -->
                  <div class="entry-meta">
                    <div class="divider-30"></div>
                    <ul class="calltoactions">
                      <li><span class="views"> <i class="far fa-heart"></i> <span class="item-views-count">7k Likes</span></span></li>
                      <li><a href="#"> <span class="views"><i class="las la-comment-dots"></i> <span class="item-views-count">5 comments</span></span></a> </li>
                      <li> <span class="views"><i class="fas fa-reply"></i> <span class="item-views-count">Reply</span> </span></li>
                    </ul>
                  </div>
                </div>
                <div class="coment-area">
                  <ul class="we-comet">
                    <li class="post-comment">
                      <div class="post-comt-box">
                        <form method="post">
                          <input id="form_email" type="text" name="text" class="form-control" placeholder="Name" required="required" data-error="Valid name is required.">
                          <textarea placeholder="Post your comment"></textarea>
                          <button type="submit">Submit</button>
                        </form>
                      </div>
                    </li>
                  </ul>
                </div>
              </section>
              <!-- .item-content -->

          </div>
        </div>
      </div>
    </section>
  </main>

<?php get_footer(); ?>