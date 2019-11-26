<?php
/**
 * Template Name: Главная
 */
get_header(); ?>

<?php
if ( have_rows('home_layout') ):
  while ( have_rows('home_layout') ) : the_row();

    if ( get_row_layout() == 'hero' ): ?>

      <section class="hero">
        <div class="container">
          <div class="hero__content">
            <div class="hero__title-shape">
              <h1 class="hero__title"><?php the_sub_field( 'title' ); ?></h1>
              <p class="hero__subtitle"><?php the_sub_field( 'subtitle' ); ?></p>
            </div>

            <img src="<?php echo THEME_URL; ?>/images/content/hero-note.png" class="hero__img" alt="Note">

            <?php if (have_rows( 'adv_list' )): ?>
              <div class="hero__benefits">
                <?php while (have_rows( 'adv_list' )): the_row(); ?>
                  <div class="hero__benefits-item">
                    <div class="hero__benefits-img">
                      <?php echo wp_get_attachment_image( get_sub_field( 'icon' ) ); ?>
                    </div>
                    <?php the_sub_field( 'descr' ); ?>
                  </div>
                <?php endwhile; ?>
              </div>
            <?php endif; ?>

            <?php $descr = get_sub_field( 'descr' );
            if ($descr): ?>
              <div class="hero__descr">
                <?php echo apply_filters( 'the_content', $descr ); ?>
              </div>
            <?php endif; ?>

          </div>
        </div>
      </section>

    <?php elseif ( get_row_layout() == 'advantages' ): ?>

      <section class="advantages">
        <div class="container">

          <?php $title = get_sub_field( 'title' );
          if ($title): ?>
            <h2 class="section-title"><?php echo $title; ?></h2>
          <?php endif; ?>

          <?php if (have_rows( 'list' )):
            $alphabet = ['а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я'];
            ?>
            <div class="advantages-list">
              <?php $i = 0; while (have_rows( 'list' )): the_row(); ?>
                <div class="advantages-list__item">
                  <div class="advantages-list__point">
                    <span class="advantages-list__point-letter"><?php echo mb_strtoupper($alphabet[$i++]); ?></span>
                    <span class="advantages-list__point-dot"></span>
                  </div>
                  <div class="advantages-list__content">
                    <h3 class="advantages-list__title"><?php the_sub_field( 'title' ); ?></h3>
                    <?php the_sub_field( 'descr' ); ?>
                    <?php echo wp_get_attachment_image( get_sub_field( 'img' ), 'large', '', array('class' => 'advantages-list__img') ); ?>
                  </div>
                </div>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>

        </div>

        <img src="<?php echo THEME_URL; ?>/images/general/shape-1.svg" class="parallax parallax-1" alt="">
        <img src="<?php echo THEME_URL; ?>/images/general/shape-2.svg" class="parallax parallax-2" alt="">
        <img src="<?php echo THEME_URL; ?>/images/general/shape-3.svg" class="parallax parallax-3" alt="">
        <img src="<?php echo THEME_URL; ?>/images/general/pen.png" class="parallax parallax-4" alt="">
        <img src="<?php echo THEME_URL; ?>/images/general/pen-2.png" class="parallax parallax-5" alt="">
        <img src="<?php echo THEME_URL; ?>/images/general/circle-1.svg" class="parallax parallax-6" alt="">
        <img src="<?php echo THEME_URL; ?>/images/general/circle-1.svg" class="parallax parallax-7" alt="">
        <img src="<?php echo THEME_URL; ?>/images/general/circle-1.svg" class="parallax parallax-8" alt="">
      </section>

    <?php endif;
  endwhile;
endif; ?>

<?php get_footer();
