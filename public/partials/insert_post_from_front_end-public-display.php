<div class="container1">
    <form method="post" action="" name="insertpost" id="insertpost" enctype="multipart/form-data">
        <?php wp_nonce_field('inser_post_from_front', 'verify_insert_post'); ?>
        <div class="form-group">
            <label for="title">Post Title:</label>
            <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" required>
        </div>
        <div class="form-group">
            <label for="category">Post Category:</label>
            <select name="post_cat[]" id="post_cat" class="form-control" required multiple="true">
                <?php
                $categories = get_categories( array(
                        'orderby' => 'name',
                        'order'   => 'ASC',
                        'hide_empty'=> false,
                        ) 
                    );
                if(!empty($categories) && count($categories) > 0)
                {
                    foreach ($categories as $key => $cat) {
                       ?>
                       <option value="<?php echo $cat->cat_ID; ?>"><?php echo $cat->name; ?></option>
                       <?php
                    }
                }
                ?>
            </select>
        </div>        
        <div class="form-group">
            <label for="post_tag">Post Tags:</label>
            <input type="text" class="form-control" id="post_tag" placeholder="tag1,tag2" name="post_tag" required>
        </div>
        <div class="form-group">
              <label for="title">Description:</label>
            <?php
            $content = '';
            $editor_id = 'mycustomeditor';
            wp_editor($content, $editor_id);
            ?>
        </div>
        <div class="form-group">
            <label for="file">Featured Image:</label>
            <input type="file" class="form-control" id="featuredimage" name="file">
        </div>
        

        <button type="submit" class="btn btn-default" id="submitpost" >Submit</button>
    </form>
</div>