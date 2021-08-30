<?php get_header(); ?>
  
  <!--============ Banner Area Start ============-->
  <section class="inside-banner d-flex align-items-center" style="background-image:url('<?php echo get_field('headline_banner'); ?>');">
    <div class="container">
      <div class="row align-items-end">
        <div class="col-lg-6 col-md-12">
        <div class="back-btn"><a href="<?php echo home_url(); ?>"><i class="las la-long-arrow-alt-left" aria-hidden="true"></i> Back Home</a></div>
          <div class="text-editorbanner">
            <h2><?php the_title(); ?></h2>
            <p><?php echo get_field('location'); ?></p>
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="bannercontent">
            <div class="event-listing">
              <div class="event-slot-time"> <span> 18</span> May </div>
              <div class="event-slot-info">
                <h3><?php echo get_field('activity'); ?></h3>
                <p><?php echo get_field('duration'); ?></p>
              </div>
              <!-- Slot info end --> 
            </div>
            <div class="event-button">
              <button href="javascript:void(0)" class="main-btn" data-bs-toggle="modal" data-bs-target="#eventsmodal">Book Now</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--============ Banner Area End ============-->

  <!-- Modal -->
<div class="modal modalform fade" id="eventsmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Book Now</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="modal-newsletter-wrap">
                <form class="eventmodal-form" action="" method="post" id="book-now">
                <?php wp_nonce_field('my_nonce'); ?>
                <input type="hidden" name="event" id="event" value="<?php the_title(); ?>">
                  <div class="form-group">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Your name" required="" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your email" required="" autocomplete="off">
                  </div>
                  <div id="message" style="color:green;"></div>
                    <button type="submit" id="book">Submit</button>
                </form>
                 
              </div>
      </div>
    </div>
  </div>
</div>
  
  <main class="maincontent">
    <section class="insidecontent">
      <div class="container"> 
        <div class="block-title">
          <h2>Description</h2>
        </div>
        <div class="row">
          <div class="col-lg-8">
            <div class="insidecontent-info">
              <?php the_content(); ?>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="insidecontent-inforight">
              <h2><span>Hours</span></h2>
              <h3><?php echo get_field('duration'); ?></h3>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="eventcontent">
      <div class="container"> 
        <div class="block-title">
          <h2>Other Events you may like</h2>
        </div>
        <div class="row">
        <?php
            $args = array(
                'post_type' => 'events',
                'category' => wp_get_post_categories(get_the_ID()),
                'numberposts' => 4,
                'exclude' => [get_the_ID()]

            );
           
            $related_posts = get_posts( $args );
            if( $related_posts ): foreach( $related_posts as $post ):
                setup_postdata($post);
                /**
                 * split event date into an array to get dat and month
                 * elem 1: month (reformat to 3 letter)
                 * elem 2: day
                 */
                $event_date = explode(" ", get_field('when'));
        ?>
                <div class="col-lg-3">
                    <div class="single-case">
                    <a href="<?php get_the_permalink(); ?>">
                    <div class="image">
                        <? the_post_thumbnail('full'); ?>
                    </div>
                    <div class="content">
                        <div class="event-listing">
                        <div class="event-slot-time"> <span> <?php echo $event_date[1]; ?></span> <?php echo substr($event_date[0], 0, 3); ?> </div>
                        <div class="event-slot-info">
                            <h3><?php the_title(); ?></h3>
                            <p><?php echo get_field('duration'); ?></p>
                        </div>
                        <!-- Slot info end --> 
                        </div>
                        <div class="event-timeline"><p>07Hrs 59Mn to go</p></div>
                    </div>
                    </a>
                    </div>
                </div>
            <?php endforeach; ?>

            <?php endif; ?>

            <?php wp_reset_postdata(); ?>
          
        </div>
      </div>
    </section>
  </main>

<?php get_footer(); ?>

<script>
  $('#book-now').submit((e) => {
    e.preventDefault();
    let name = $('#name').val();
    let email = $('#email').val();
    let _wpnonce = $('#_wpnonce').val();
    let event = $('#event').val();

    $.ajax({
      type: 'POST',
      url: "<?php echo admin_url('admin-ajax.php'); ?>",
      data: {
        action: "book_now",
        email: email,
        event: event,
        name: name,
        _wpnonce: _wpnonce

      },
      dataType: 'html',
      cache: false,
      beforeSubmit: () => {
        $("#book").attr('disabled', 'disabled');

      },
      success: (res) => {
        if(res === 1) {
          $('#message').html("Not booked, please try again later");
          
        } else {
          $('#message').html("Here’s to staying customer-obsessed");
          $('#name').val('');
          $('#email').val('');

        }
        

      }
    });

  })
</script>