<?php
/**
 * Template part for displaying upcoming events on the home
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package elevkaren
 */

?>

<div class="event-item-wrap">
    <div class="event-item-info">
        <h3><?php the_title();?></h3>
        <p><?php the_field('excerpt'); ?></p>
        <div class="subfield-date-wrap">
            <span><i class="far fa-calendar-alt"></i> <?php the_field('date'); ?></span>
            <span><i class="fas fa-clock"></i> <?php the_field('time'); ?></span>
        </div>
        <a href="<?php the_permalink();?>">Läs mer</a>
    </div>
    <div class="event-item-image">
        <?php
        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
        the_post_thumbnail( 'medium' );
        }
        ?>
    </div>
</div>