<?php
    $post_id = get_the_ID();
    $terms = get_the_terms($post_id,'course-tag');
    $tags_external = array();
    $tags_internal = array();

    if(!empty($terms)) :
        $counter = 0;
        foreach($terms as $term){ 
            if(get_field('tag_external',$term)) {
               $tags_external[] = $term->name;
            }else{
                $tags_internal[] = $term->name;
            }
        }
?>
            <span class="post-tag">
               
                <?php if(!empty($tags_external)) : ?>
                    <div>
                        <span  class="tags-title">Externals: </span>
                    <?php foreach($tags_external as $term_ex): ?>  
                            <span class="tag-name btn btn-info"><?=$term_ex;?></span>
                           
                    <?php endforeach ?>
                    </div>
                <?php endif; ?>
                <?php if(!empty($tags_internal)) : ?>
                        <div>
                            <span class="tags-title">Internals: </span>
                        <?php foreach($tags_internal as $term_in):?>
                                <span class="tag-name btn btn-info"><?=$term_in;?></span>
                            
                        <?php endforeach ?>
                        </div> 
                <?php endif; ?>
            </span>
<?php 
    endif;
?>