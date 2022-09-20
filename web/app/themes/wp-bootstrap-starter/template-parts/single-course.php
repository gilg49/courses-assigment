<div class="row">
    <div class="single-course-title course-title col-sm-12">
        <h1><?=the_title()?></h1>
    </div>
</div>
<div class="row">
    <div class="single-course-image-wrap course-image-wrap col-sm-12">
        <img src="<?=get_field('course_image',get_the_ID())['sizes']['large'];?>" class="img-fluid" />
    </div> 
</div>
<div class="row course-data-row">
    <div class="course-trailer col-lg-6 col-md-4 col-sm-12">
        <span class="course-title"><?=__('Trailer','')?> : </span><span class="course-title-value"><?=get_field('course-trailer',get_the_ID());?></span>
    </div>
    <div class="course-date col-lg-3 col-md-4 col-sm-12">
        <span class="course-title"><?=__('Start date','')?> : </span><span class="course-title-value"><?=get_field('course_start',get_the_ID());?></span>
    </div>
    <div class="course-date col-lg-3 col-md-4 col-sm-12">
        <span class="course-title"><?=__('End date','')?> : </span><span class="course-title-value"><?=get_field('course_end',get_the_ID());?></span>
    </div>
</div>
<div class="row course-desc">
    <div class="course-content-wrap">
        <span class="course-title">Description</span><p><?=the_content()?></p>
    </div>
</div>

<div class="tags-wrap">
     <?php get_template_part( 'template-parts/course-tags', 'taxonomy' ); ?>  
</div> 

