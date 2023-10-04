<?php
$cat_id = get_queried_object()->term_id;
$args_child = array(
    'orderby' => 'name',
    'order' => 'ASC',
    'hide_empty' => true,
    'fields' => 'all',
    'hierarchical' => true,
    'child_of' => $cat_id,
);
$child_cats = get_terms('category', $args_child);
?>
<main class="page-content" id="page-content">
    <div class="container">

        <?php get_template_part('template-parts/content' , 'breadcrumb'); ?>

        <div class="post-parent">
            <h1 class="title-page"><?php echo get_queried_object()->name; ?></h1>
            
            <?php require get_template_directory() . '/component/category-ck.php'; ?>

        </div>
    </div>

    <?php if(!empty($child_cats)): ?>
        <div class="list-cat-child">
            <div class="container">
                <ul class="list-ck">
                    <?php foreach ($child_cats as $key_value) {
                        echo '<li><a href="'. get_term_link($key_value->term_id) .'">'. $key_value->name .'</a></li>';
                    } ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>

    <div class="list-child-detail">
        <div class="container">
            <div class="row">
                <div class="col-md-9">

                <?php 
                if(!empty($child_cats)):
                    $i = 0;
                    foreach ($child_cats as $child_cat): 
                        $i ++;
                        $cat_id = $child_cat->term_id;
                        $child_cat_link = get_term_link($child_cat->term_id,'category');

                        if( $i % 2 != 0 ){
                            require get_template_directory() . '/component/category-ck-1.php';
                        }else{
                            require get_template_directory() . '/component/category-ck-2.php';
                        }

                    endforeach;
                endif; ?>
                </div>

                <?php get_sidebar(); ?>

            </div>
        </div>
    </div>
</main>