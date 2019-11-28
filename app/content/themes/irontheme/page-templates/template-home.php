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

            <a href="#s-order" class="hero__btn-order">Купить <br><span>от 1200 <i class="rub"></i></span></a>

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

      <section class="advantages" id="advantages">
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

        <img src="<?php echo THEME_URL; ?>/images/general/shape-1.svg" class="parallax parallax-1" alt="" data-rellax-speed="0.5">
        <img src="<?php echo THEME_URL; ?>/images/general/shape-2.svg" class="parallax parallax-2" alt="" data-rellax-speed="0.5">
        <img src="<?php echo THEME_URL; ?>/images/general/shape-3.svg" class="parallax parallax-3" alt="" data-rellax-speed="0.5">
        <img src="<?php echo THEME_URL; ?>/images/general/pen.png" class="parallax parallax-4" alt="" data-rellax-speed="0.5">
        <img src="<?php echo THEME_URL; ?>/images/general/pen-2.png" class="parallax parallax-5" alt="" data-rellax-speed="0.5">
        <img src="<?php echo THEME_URL; ?>/images/general/circle-1.svg" class="parallax parallax-6" alt="" data-rellax-speed="0.5">
        <img src="<?php echo THEME_URL; ?>/images/general/circle-1.svg" class="parallax parallax-7" alt="" data-rellax-speed="0.5">
        <img src="<?php echo THEME_URL; ?>/images/general/circle-1.svg" class="parallax parallax-8" alt="" data-rellax-speed="0.5">
      </section>

    <?php elseif ( get_row_layout() == 'review' ): ?>

      <section class="review" id="review">
        <div class="container">

          <?php $title = get_sub_field( 'title' );
          if ($title): ?>
            <h2 class="section-title"><?php echo $title; ?></h2>
          <?php endif; ?>

          <div class="review__container">
            <div class="review__left">
              <?php if (have_rows( 'list_video' )): ?>
                <div class="review-video-slider swiper-container">
                  <div class="swiper-wrapper">
                    <?php while (have_rows( 'list_video' )): the_row(); ?>
                      <div class="review-video-slider__item swiper-slide">
                        <div class="video">
                          <a href="<?php echo esc_url(get_sub_field('link')); ?>" class="video__link"></a>
                          <button type="button" aria-label="Запустить видео" class="video__button"></button>
                        </div>
                        <?php $name = get_sub_field( 'name' );
                        if ($name): ?>
                          <p class="review-video-slider__name"><?php echo $name; ?></p>
                        <?php endif; ?>
                      </div>
                    <?php endwhile; ?>
                  </div>
                  <div class="slider-controls">
                    <div class="swiper-button-prev"><?php ith_the_icon( 'arrow-left' ); ?></div>
                    <div class="swiper-button-next"><?php ith_the_icon( 'arrow-right' ); ?></div>
                  </div>
                </div>
              <?php endif; ?>

              <?php $gallery = get_sub_field( 'gallery' );
              if ($gallery): ?>
                <div class="review__gallery">
                  <h3 class="review__subtitle">Фото клиентов с нашими блокнотами</h3>

                  <div class="review-photo-slider swiper-container">
                    <div class="swiper-wrapper">
                      <?php foreach ($gallery as $img): ?>
                        <div class="review-photo-slider__item swiper-slide">
                          <a href="<?php echo wp_get_attachment_image_url( $img, 'full' ); ?>" data-fancybox="gallery">
                            <?php echo wp_get_attachment_image( $img, 'ith-thumb' ); ?>
                          </a>
                        </div>
                      <?php endforeach; ?>
                    </div>
                    <div class="slider-controls">
                      <div class="swiper-button-prev"><?php ith_the_icon( 'arrow-left' ); ?></div>
                      <div class="swiper-button-next"><?php ith_the_icon( 'arrow-right' ); ?></div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>

            </div><!-- /.review__left -->

            <div class="review__right">
              <div class="review__phone-wrap">
                <div class="review__phone">
                  <img src="<?php echo THEME_URL; ?>/images/content/phone.png" alt="">
                </div>

                <?php
                  $instagram = get_field( 'instagram', 'option' );
                  $facebook = get_field( 'facebook', 'option' );
                 if ($instagram || $facebook): ?>
                  <div class="review__social">
                    <p class="review__social-title">Следите за нами <br>в социальных сетях </p>
                    <div class="review__social-box">
                      <?php if ($instagram): ?>
                        <a href="<?php echo esc_url( $instagram ); ?>" target="_blank">Instagram</a>
                      <?php endif; ?>
                      <?php if ($facebook): ?>
                        <a href="<?php echo esc_url( $facebook ); ?>" target="_blank">Facebook</a>
                      <?php endif; ?>
                    </div>
                  </div>
                 <?php endif; ?>

              </div>
            </div>
          </div>

        </div>

        <img src="<?php echo THEME_URL; ?>/images/general/circle-3.svg" class="parallax parallax-9" alt="" data-rellax-speed="0.5">
        <img src="<?php echo THEME_URL; ?>/images/general/circle-3.svg" class="parallax parallax-10" alt="" data-rellax-speed="0.5">
        <img src="<?php echo THEME_URL; ?>/images/general/circle-1.svg" class="parallax parallax-11" alt="" data-rellax-speed="0.5">
        <img src="<?php echo THEME_URL; ?>/images/general/pen-3.png" class="parallax parallax-12" alt="" data-rellax-speed="0.5">
      </section>

    <?php elseif ( get_row_layout() == 'order' ): ?>

      <section class="s-order" id="s-order">
        <div class="container">
          <div class="s-order__container">
            <div class="section-head">
              <?php $title = get_sub_field( 'title' );
              $subtitle = get_sub_field( 'subtitle' );
              if ($title): ?>
                <h2 class="section-title"><?php echo $title; ?></h2>
              <?php endif; ?>

              <?php if ($subtitle): ?>
                <p><?php echo $subtitle; ?></p>
              <?php endif; ?>
            </div>

            <?php if (get_sub_field( 'notes' ) && get_sub_field( 'colors' )): ?>
              <form class="order">
                <div class="order__left">
                  <div class="order__item order__item--color">
                    <p class="order__title">Выберете цвет:</p>
                    <div class="order__colors">
                      <?php $i = 0; while (have_rows( 'colors' )): the_row(); ?>
                        <label class="order__color">
                          <input type="radio" name="color" value="<?php the_sub_field( 'color_name' )?>" class="order__color-input" <?php checked( $i++, 0 ); ?> data-img="<?php the_sub_field( 'img' ); ?>">
                          <span class="order__color-box">
                            <span class="order__color-box-inner" style="background-color: <?php the_sub_field( 'color' ); ?>;"></span>
                          </span>
                        </label>
                      <?php endwhile; ?>
                    </div>
                  </div>

                  <div class="order__item order__item--size">
                    <p class="order__title">Выберете размер:</p>
                    <div class="order__sizes">
                      <?php $i = 0; while (have_rows( 'notes' )): the_row(); ?>
                        <label class="order__size">
                          <input type="radio" name="size" value="<?php the_sub_field( 'size' )?>" class="order__size-input" <?php checked( $i++, 0 ); ?> data-price="<?php the_sub_field( 'price' ); ?>">
                          <span class="order__size-box">
                            <span class="order__size-box-inner"><?php the_sub_field( 'size' ); ?></span>
                          </span>
                        </label>
                      <?php endwhile; ?>
                    </div>
                  </div>

                  <div class="order__item order__item--price">
                    <p class="order__title">Цена блокнота:</p>
                    <span class="order__price"><span class="order__price-val">0</span> <span class="order__price-currency"><i class="rub"></i></span></span>
                  </div>

                  <a href="#" class="btn order-modal_open">Оформить заказ</a>
                </div>
                <!-- /.order__left -->

                <div class="order__right">
                  <div class="order__img-wrap"></div>
                  <div class="order__right-btn">
                    <a href="#" class="btn order-modal_open">Оформить заказ</a>
                  </div>
                </div>
                <!-- /.order__right -->
              </form>
            <?php endif; ?>

          </div>

        </div>

        <img src="<?php echo THEME_URL; ?>/images/general/circle-1.svg" class="parallax parallax-13" alt="" data-rellax-speed="0.5">
        <img src="<?php echo THEME_URL; ?>/images/general/circle-3.svg" class="parallax parallax-14" alt="" data-rellax-speed="2">
        <img src="<?php echo THEME_URL; ?>/images/general/circle-4.svg" class="parallax parallax-15" alt="" data-rellax-speed="0.5">
        <img src="<?php echo THEME_URL; ?>/images/general/shape-5.svg" class="parallax parallax-16" alt="" data-rellax-speed="0.5">
      </section>

    <?php endif;
  endwhile;
endif; ?>

<?php get_footer();
