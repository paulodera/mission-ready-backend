<?php get_header(); ?>

  
  <!--============ Banner Area Start ============-->
  <section class="inside-banner d-flex align-items-center" style="background-image:url('<?php bloginfo('template_directory'); ?>/images/banners/customer-banner.jpg');">
    <div class="container">
      <div class="row align-items-end">
        <div class="col-lg-6 col-md-12">
          <div class="back-btn"><a href="<?php echo home_url(); ?>"><i class="las la-long-arrow-alt-left" aria-hidden="true"></i> Back Home</a></div>
          <div class="text-editorbanner">
            <h2><?php the_title(); ?></h2>
          </div>
            <div style="color:#FFFFFF;"> It’s the activities below that reflect on how we work to stay customer obsessed as a team.</div>
        </div>
      </div>
    </div>
  </section>
  <!--============ Banner Area End ============-->
  

<main class="maincontent">
  <section class="stories-blockarea">
    <div class="container">
      <div class="row">
          <!--Gallery Item-->
          <?php
            /**
             * fetch the 'events' on featured area
             * throttle limit on numberposts variable
             */
                $args = array(
                    'post_type' => 'events'
                );
                
                $latest_posts = get_posts( $args );
                
                if ($latest_posts) : foreach ($latest_posts as $post):
                    setup_postdata($post);
                    /**
                     * split event date into an array to get dat and month
                     * elem 1: month (reformat to 3 letter)
                     * elem 2: day
                     */
                    $event_date = explode(" ", get_field('when'));
        ?>
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="single-case">
                <a href="<?php echo get_permalink(); ?>">
                    <div class="image">
                        <?php the_post_thumbnail('full'); ?>
                    </div>
                    <div class="content">
                        <div class="event-listing">
                            <div class="event-slot-time"><span><?php echo $event_date[1]; ?></span> <?php echo substr($event_date[0], 0, 3); ?></div>
                            <div class="event-slot-info">
                                <h3><?php the_title(); ?></h3>
                                <p><?php echo get_field('duration'); ?></p>
                            </div>
                            <!-- Slot info end -->
                        </div>
                        <!-- <div class="event-timeline"><p>07Hrs 59Mn to go</p></div> -->
                    </div>
                </a>
            </div>
        </div>
        <?php endforeach; ?>

        <?php endif; ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>