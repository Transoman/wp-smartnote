  </div><!-- /.content -->

  <footer class="footer">
    <div class="container">
      <div class="footer__top">
        <div class="logo footer__logo">
          <img src="<?php echo THEME_URL; ?>/images/general/logo-black.png" width="225" alt="SmartNote">
        </div>

        <?php $phone = get_field( 'phone', 'option' );
        if ($phone): ?>
          <div class="phone footer__phone">
            <a href="tel:<?php echo preg_replace( '![^0-9/+]+!', '', $phone ); ?>" class="phone__tel"><?php echo $phone; ?></a>
          </div>
        <?php endif; ?>
      </div>

      <p class="copy">© <?php echo date( 'Y' ); ?> SmartNote</p>

    </div>
  </footer><!-- /.footer -->

</div><!-- /.wrapper -->

  <div class="modal" id="order-modal">
    <button class="modal__close order-modal_close"></button>

    <div class="modal__content">
      <?php echo do_shortcode( '[contact-form-7 id="68" title="Оформить заказ"]' ); ?>
    </div>
  </div>

  <svg style="position: absolute; top: 1px; left: 1px; z-index: -100; height: 1px; width: 1px;">
    <defs>
      <linearGradient id="gradient" x1="0" y1="0%" x2="0" y2="100%">
        <stop offset="0%" style="stop-color: #FABD00"></stop>
        <stop offset="100%" style="stop-color: #FC8908"></stop>
      </linearGradient>
    </defs>
  </svg>

<?php wp_footer(); ?>

</body>
</html>
