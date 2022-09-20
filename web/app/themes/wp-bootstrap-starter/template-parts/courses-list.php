<div class="row courses-rows">
    <?php
        if(isset($_GET['course-tag'])) {
            $args = array(
                'post_type' => 'courses',
                'posts_per_page' => 10,
                'paged' => get_query_var('paged') ? get_query_var('paged') : 1
            );

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

            $query = new WP_Query($args);
            if($query->have_posts()) :
                $pages_num = $query->max_num_pages;
                while ( have_posts() ) : the_post(); ?>
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

            <?php endwhile; // End of the loop. 
            endif; // $query->have_posts

        }
  ?>
</div><!--courses-rows-->

<?php echo get_template_part( 'template-parts/paganation-posts', 'paganation-posts',array("pages_num"=>$pages_num)); ?>  

<!-- <php else : ?>
    <h2>The are no courses</h2>
<php endif;?> -->

<?php wp_reset_postdata(); ?>