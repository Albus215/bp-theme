<?php
/*
*  Template Name: Front page
*/
get_header();
?>
<main id="front" class="front">
    <section class="hero">
        <?php if (have_rows('hero')) : ?>
            <?php while (have_rows('hero')) : the_row(); ?>
                <?php the_sub_field('title'); ?>
                <?php the_sub_field('undertitle'); ?>
                <?php if (have_rows('links')) : ?>
                    <?php while (have_rows('links')) : the_row(); ?>
                        <?php $link = get_sub_field('link'); ?>
                        <?php if ($link) : ?>
                            <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>"><?php echo esc_html($link['title']); ?></a>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php else : ?>
                    <?php // no rows found 
                    ?>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
    <section class="banners">
        <?php if (have_rows('banners')) : ?>
            <?php while (have_rows('banners')) : the_row(); ?>
                <?php the_sub_field('category'); ?>
                <?php the_sub_field('text'); ?>
                <?php $link = get_sub_field('link'); ?>
                <?php if ($link) : ?>
                    <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>"><?php echo esc_html($link['title']); ?></a>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php else : ?>
            <?php // no rows found 
            ?>
        <?php endif; ?>
    </section>
    <section class="products">
        <?php if (have_rows('products')) : ?>
            <?php while (have_rows('products')) : the_row(); ?>
                <?php the_sub_field('text'); ?>
                <?php the_sub_field('description'); ?>
                <?php $link = get_sub_field('link'); ?>
                <?php if ($link) : ?>
                    <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>"><?php echo esc_html($link['title']); ?></a>
                <?php endif; ?>
                <?php if (have_rows('products_block')) : ?>
                    <?php while (have_rows('products_block')) : the_row(); ?>
                        <?php $product = get_sub_field('product'); ?>
                        <?php if ($product) : ?>
                            <a href="<?php echo get_permalink($product); ?>"><?php echo get_the_title($product); ?></a>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php else : ?>
                    <?php // no rows found 
                    ?>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>

    </section>
    <section class="advantages">
        <?php if (have_rows('advantages')) : ?>
            <?php while (have_rows('advantages')) : the_row(); ?>
                <?php $image = get_sub_field('image'); ?>
                <?php if ($image) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
                <?php $logo = get_sub_field('logo'); ?>
                <?php if ($logo) : ?>
                    <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
                <?php endif; ?>
                <?php the_sub_field('title'); ?>
                <?php the_sub_field('undertitle'); ?>
                <?php the_sub_field('text'); ?>
                <?php if (have_rows('links')) : ?>
                    <?php while (have_rows('links')) : the_row(); ?>
                        <?php $link = get_sub_field('link'); ?>
                        <?php if ($link) : ?>
                            <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>"><?php echo esc_html($link['title']); ?></a>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php else : ?>
                    <?php // no rows found 
                    ?>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
    <section class="slider">
        <?php if (have_rows('slider')) : ?>
            <?php while (have_rows('slider')) : the_row(); ?>
                <?php the_sub_field('title'); ?>
                <?php if (have_rows('carousel')) : ?>
                    <?php while (have_rows('carousel')) : the_row(); ?>
                        <?php the_sub_field('block'); ?>
                    <?php endwhile; ?>
                <?php else : ?>
                    <?php // no rows found 
                    ?>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
    <section class="help">
        <?php if (have_rows('help_banner')) : ?>
            <?php while (have_rows('help_banner')) : the_row(); ?>
                <?php $left_bg = get_sub_field('left_bg'); ?>
                <?php if ($left_bg) : ?>
                    <img src="<?php echo esc_url($left_bg['url']); ?>" alt="<?php echo esc_attr($left_bg['alt']); ?>" />
                <?php endif; ?>
                <?php the_sub_field('category'); ?>
                <?php the_sub_field('title'); ?>
                <?php $link = get_sub_field('link'); ?>
                <?php if ($link) : ?>
                    <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>"><?php echo esc_html($link['title']); ?></a>
                <?php endif; ?>
                <?php $right_bg = get_sub_field('right_bg'); ?>
                <?php if ($right_bg) : ?>
                    <img src="<?php echo esc_url($right_bg['url']); ?>" alt="<?php echo esc_attr($right_bg['alt']); ?>" />
                <?php endif; ?>
                <?php $right_icon = get_sub_field('right_icon'); ?>
                <?php if ($right_icon) : ?>
                    <img src="<?php echo esc_url($right_icon['url']); ?>" alt="<?php echo esc_attr($right_icon['alt']); ?>" />
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
    <section class="performance">
        <?php if (have_rows('performance')) : ?>
            <?php while (have_rows('performance')) : the_row(); ?>
                <?php $image = get_sub_field('image'); ?>
                <?php if ($image) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
                <?php the_sub_field('category'); ?>
                <?php the_sub_field('text'); ?>
                <?php if (have_rows('links')) : ?>
                    <?php while (have_rows('links')) : the_row(); ?>
                        <?php $link = get_sub_field('link'); ?>
                        <?php if ($link) : ?>
                            <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>"><?php echo esc_html($link['title']); ?></a>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php else : ?>
                    <?php // no rows found 
                    ?>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
    <section class="medical">
        <?php if (have_rows('medical_banner')) : ?>
            <?php while (have_rows('medical_banner')) : the_row(); ?>
                <?php $left_bg = get_sub_field('left_bg'); ?>
                <?php if ($left_bg) : ?>
                    <img src="<?php echo esc_url($left_bg['url']); ?>" alt="<?php echo esc_attr($left_bg['alt']); ?>" />
                <?php endif; ?>
                <?php $right_bg = get_sub_field('right_bg'); ?>
                <?php if ($right_bg) : ?>
                    <img src="<?php echo esc_url($right_bg['url']); ?>" alt="<?php echo esc_attr($right_bg['alt']); ?>" />
                <?php endif; ?>
                <?php the_sub_field('category'); ?>
                <?php the_sub_field('title'); ?>
                <?php the_sub_field('undertitle'); ?>
                <?php the_sub_field('text'); ?>
                <?php $link = get_sub_field('link'); ?>
                <?php if ($link) : ?>
                    <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>"><?php echo esc_html($link['title']); ?></a>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
</main>
<?php get_footer();
?>