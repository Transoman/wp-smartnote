<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="format-detection" content="telephone=no">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv-printshiv.min.js"></script>
  <![endif]-->
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

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
          <li><a href="#order">Заказать</a></li>
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