<?php
/**
 * The template for displaying the footer.
 *
 * @package BEMpress
 */
?>
		</div><!-- #site-inner -->

        <?php tha_footer_before(); ?>

		<footer <?php hybrid_attr( 'footer' ); ?>>

            <?php tha_footer_top(); ?>

			<?php hybrid_get_sidebar( 'footer' ); ?>

			</div><!-- .wrap -->

                <p class="credit t-bg__1 u-p- u-mb0">
                    <?php
                    printf(
                        __( 'Copyright &#169; %1$s %2$s.', 'abraham' ),
                        date_i18n( 'Y' ), hybrid_get_site_link()
                    );
                    ?>
                </p><!-- .credit -->

            <?php tha_footer_bottom(); ?>

		</footer><!-- .footer -->

        <?php tha_footer_after(); ?>

	</div><!-- .site-container -->

    <div class="layout__obfuscator">
    <i class="fa fa-times-circle"></i>
    </div>
    <?php tha_body_bottom(); ?>

	<?php wp_footer(); ?>

</body>
</html>
