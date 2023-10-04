<div class="col-sm-3" id="sidebar-video">
    <ul>
    <?php
    $parent_cat_arg = array('hide_empty' => false, 'parent' => 0 );
    $parent_cat = get_terms('videocat',$parent_cat_arg);
    foreach ($parent_cat as $catVal) {
        echo '<li class="cat-item cat-item-' . $catVal->term_id . '"><a href="' . get_term_link($catVal->term_id , 'videocat') . '">' . $catVal->name . '</a></li>';
        $child_arg = array( 'hide_empty' => false, 'parent' => $catVal->term_id );
        $child_cat = get_terms( 'videocat', $child_arg );
        echo '<ul  class="children">';
        foreach( $child_cat as $child_term ) {
            echo '<li class="cat-item cat-item-' . $child_term->term_id . '"><a href="' . get_term_link($catVal->term_id , 'videocat') . '">'.$child_term->name . '</a></li>';
        }
        echo '</ul>';
    }
    ?>
    </ul>
</div>