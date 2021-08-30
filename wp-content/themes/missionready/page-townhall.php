<?php get_header(); ?>
  
  <!--============ Banner Area Start ============-->
  <section class="inside-banner d-flex align-items-center" style="background-image:url('<?php echo get_field('headline_banner'); ?>');">
    <div class="container">
      <div class="row align-items-end">
        <div class="col-lg-6 col-md-12">
          <div class="back-btn"><a href="<?php echo home_url(); ?>"><i class="las la-long-arrow-alt-left" aria-hidden="true"></i> Back Home</a></div>
          <div class="text-editorbanner">
            <h2><?php echo get_field('title'); ?></h2> <!-- <span>Customer Obsession</span> sessions -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--============ Banner Area End ============-->
  
  <main class="maincontent">
    <section class="get-blockarea filter filter-basic">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="top-getinfo">
              <p><?php the_content(); ?></p>
            </div>
          </div>
        </div>
        <div class="top-getfilter">
          <h2><?php echo get_field('tagline'); ?></h2>
          <div class="filters">
          <ul class="nav filter-nav">
            <li class="nav-item active"><a class="nav-link filter-button" href="javascript:void(0)" data-filter="">All</a></li>
            <li class="nav-item"><a class="nav-link filter-button" href="javascript:void(0)" data-filter="prev">Prev</a></li>
            <li class="nav-item"><a class="nav-link filter-button" href="javascript:void(0)" data-filter="upcoming">Upcoming</a></li>
          </ul>
        </div>
          <!-- <div class="filter-nav">
            <button class="btn active filter-button" data-filter="">All</button>
            <button class="btn btn-primary filter-button" data-filter="prev">Prev</button>
            <button class="btn btn-primary filter-button" data-filter="upcoming">Upcoming</button>
          </div> -->
          <div class="filter-gallery filters-content">
            <div class="row">
            <?php
                /**
                 * fetch the 'townhall' sessions on featured area
                 * throttle limit on numberposts variable
                 */
                $args = array(
                    'numberposts' => 4,
                    'post_type' => 'townhall'
                );
                
                $latest_posts = get_posts( $args );
                
                if ($latest_posts) : foreach ($latest_posts as $post):
                    setup_postdata($post);
            ?>
              <div class="col-lg-4">
                <div class="single-case" data-category="<?php echo get_the_category()[0]->slug; ?>">
                  <div class="item-gallery">
                    <div class="video-ovelay-single"> <a href="<?php echo get_the_permalink(); ?>" class="video-link"> <span class="video-play play-btm-right"></span><?php the_post_thumbnail('full'); ?></a> </div>
                    <div class="content">
                      <div class="event-listing">
                        <div class="event-slot-time"> <?php echo get_field('duration'); ?></div>
                        <div class="event-slot-info">
                          <h3><?php the_title(); ?></h3>
                          <a href="<?php echo get_the_permalink(); ?>">Learn more <i class="las la-long-arrow-alt-right"></i></a> </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>

            <?php endif; ?>

            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

<?php get_footer(); ?>