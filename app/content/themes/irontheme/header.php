<!doctype html>
<html <?php language_attributes(); ?> class="loading">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="format-detection" content="telephone=no">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv-printshiv.min.js"></script>
  <![endif]-->

  <style>
    .preloader {
      position: fixed;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      background-color: #ccc;
      background: linear-gradient(5deg, #5F10C3, #A26AEA);
      background-size: 400% 400%;
      -webkit-animation: gr-anim 10s ease infinite;
      -moz-animation: gr-anim 10s ease infinite;
      animation: gr-anim 10s ease infinite;
      z-index: 100;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .preloader img {
      -webkit-animation: pulse-anim 3s ease infinite;
      -moz-animation: pulse-anim 3s ease infinite;
      animation: pulse-anim 3s ease infinite;
    }

    @-webkit-keyframes gr-anim {
      0%{background-position:51% 0%}
      50%{background-position:50% 100%}
      100%{background-position:51% 0%}
    }
    @-moz-keyframes gr-anim {
      0%{background-position:51% 0%}
      50%{background-position:50% 100%}
      100%{background-position:51% 0%}
    }
    @keyframes gr-anim {
      0%{background-position:51% 0%}
      50%{background-position:50% 100%}
      100%{background-position:51% 0%}
    }

    @keyframes pulse-anim {
      0%{transform: scale(1)}
      50%{transform: scale(1.1)}
      100%{transform: scale(1)}
    }

  </style>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="preloader">
  <img src="<?php echo THEME_URL; ?>/images/general/logo.png" width="225" alt="SmartNote">
</div>

<div class="wrapper">
  <header class="header">
    <div class="container">

      <div class="logo header__logo">
        <img src="<?php echo THEME_URL; ?>/images/general/logo.png" width="225" alt="SmartNote">
      </div>

      <nav class="nav">
        <button type="button" class="nav__close"></button>

        <ul class="nav-list">
          <li><a href="#advantages">Преимущества</a></li>
          <li><a href="#review">Отзывы</a></li>
          <li><a href="#s-order">Заказать</a></li>
        </ul>

        <?php $phone = get_field( 'phone', 'option' );
        if ($phone): ?>
          <div class="phone nav__phone">
            <a href="tel:<?php echo preg_replace( '![^0-9/+]+!', '', $phone ); ?>" class="phone__tel"><?php echo $phone; ?></a>
          </div>
        <?php endif; ?>
      </nav>

      <div class="nav-overlay"></div>

      <?php if ($phone): ?>
        <div class="phone header__phone">
          <a href="tel:<?php echo preg_replace( '![^0-9/+]+!', '', $phone ); ?>" class="phone__tel"><?php echo $phone; ?></a>
        </div>
      <?php endif; ?>

      <button type="button" class="nav-toggle">
        <span class="nav-toggle__line"></span>
      </button>

    </div>
  </header><!-- /.header-->

  <div class="content">