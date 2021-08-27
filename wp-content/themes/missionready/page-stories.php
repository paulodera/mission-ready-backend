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
        </div>
      </div>
    </div>
  </section>
  <!--============ Banner Area End ============-->
  

<main class="maincontent">
  <section class="stories-blockarea">
    <div class="container">
      <div class="row">
      <?php 
            /*
             * fetch the latest stories on featured area
             * throttle limit on numberposts variable
             
                $args = array(
                    'numberposts' => 2 
                );
            */
            
            $latest_posts = get_posts();
            
            if ($latest_posts) : foreach ($latest_posts as $post):
                setup_postdata($post);
        ?>
        <div class="col-xl-3 col-lg-4 col-md-6">
          <div class="single-story">
            <div class="video-ovelay-single"> <a href="<?php echo get_the_permalink(); ?>" class="video-link"> <span class="video-play play-btm-right"></span> <?php echo the_post_thumbnail(); ?> </a> </div>
            <div class="content">
              <div class="storiesinfo">
                  <h3><?php the_title(); ?></h3>
                  <a href="<?php echo get_the_permalink(); ?>">Learn more <i class="las la-long-arrow-alt-right"></i></a>
              </div>
            </div>
          </div>
        </div>

        <?php endforeach; ?>

        <?php endif; ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>