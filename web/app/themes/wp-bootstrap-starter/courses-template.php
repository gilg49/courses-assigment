<?php
/**
* Template Name: Courses list
 */

get_header(); ?>

 <section id="" class="content-area col-lg-3 col-md-6 col-sm-12">
    <?php get_template_part( 'template-parts/course-tags-form', 'taxonomy' ); ?>       
</section>

<section id="primary" class="content-area col-lg-9 col-md-6 col-sm-12">
		<div id="main" class="site-main" role="main">
            <div class="row courses-rows">
                <?php
                $args = array(
                    'post_type' => 'courses',
                    'posts_per_page' => 10,
                    'paged' => isset($_GET['paged']) ? $_GET['paged'] : 1
                );
            
                if(isset($_GET['course-tag'])) :
                    $c_tags = array();
                    foreach ($_GET['course-tag'] as $course_tg) {
                        $c_tags[] = $course_tg;
                    }
                    $args['tax_query'] = array(
                        array(
                        'taxonomy' => 'course-tag',
                        'field' => 'slug',
                        'terms' => $c_tags
                        )
                    );
                endif;

                $query = new WP_Query($args);
                ?>
                <?php if($query->have_posts()) : ?>
                
                    <?php
                    $pages_num = $query->max_num_pages;
                    while ( $query->have_posts() ) : $query->the_post(); ?>
                        <div class="post-wrap col-lg-4 col-md-6 col-sm-12">
                            <a class="post-link" href="<?=the_permalink()?>">
                                <div class="post-title"><?=the_title()?></div>
                                <div class="post-image-wrap">
                                    <img src="<?=get_field('course_image',get_the_ID())['sizes']['medium'];?>" class="img-thumbnail" />
                                </div> 
                                <div class="tags-wrap">
                                    <?php get_template_part( 'template-parts/course-tags', 'courses-tags' ); ?>  
                                </div>                          
                            </a>
                        
                        </div>
            
                <?php endwhile; // End of the loop. ?>
            </div>
            
            <?php echo get_template_part( 'template-parts/paganation-posts', 'paganation-posts',array("pages_num"=>$pages_num) ); ?>  
            
            <?php else : ?>
                <h2>The are no courses</h2>
            <?php endif;?>

            <?php wp_reset_postdata(); ?>
        
		</div><!-- #main -->
	</section><!-- #primary -->

  

<?php
get_footer();