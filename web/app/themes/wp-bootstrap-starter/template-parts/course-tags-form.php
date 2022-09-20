<div id="form-wrap">
    <form method="GET">
        <fieldset>
            <h3><?=__('Filter by Courses Tags','');?></h3>
        <?php
            $coureses_tags = get_terms(array(
                'taxonomy' => 'course-tag',
                'hide_empty' => false
            ));
            $url_term = get_queried_object();

            foreach($coureses_tags as $tag):
        ?>
            <div class="field-wrap">
                <label class="tag-wrap"> 
                    <input type="checkbox" name="course-tag[]" value="<?=$tag->slug?>" 
                        <?php
                            checked(
                                ((isset($_GET['course-tag']) && in_array($tag->slug,$_GET['course-tag'])) || (isset($url_term->slug) && $url_term->slug == $tag->slug))
                            );
                        ?>
                    />
                    <span class="tag-name"><?=$tag->name;?></span><span class="tag-count">(<?=$tag->count?>)</span>
                </label>
            </div>
        <?php endforeach ?>

        <button type="submit">Apply</button>
        </fieldset>
        
    </form>
</div>

