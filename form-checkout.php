<?php 
// Template Name: Template Checkout
get_header()





?>
<?php
//child17/woocommerce/checkout/form-checkout.php
// Complete file: https://gist.githubusercontent.com/igorbenic/ad39ec3cd53d8b2d875f01870983f71d/raw/d7af10a4c1c954d1909a9776e2484ce5730f4834/form-checkout.php
// ....
?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
    <div class="col2-set">
        <?php if ( $checkout->get_checkout_fields() ) : ?>
            <div class="col-1" id="customer_details">
              <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

                    <?php do_action( 'woocommerce_checkout_billing' ); ?>
                
                    <?php do_action( 'woocommerce_checkout_shipping' ); ?>

              <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
            </div>
        <?php endif; ?>
        <div class="col-2">
            <h3 id="order_review_heading"><?php _e( 'Your order', 'woocommerce' ); ?></h3>
              
            <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
          
            <div id="order_review" class="woocommerce-checkout-review-order">
                <?php do_action( 'woocommerce_checkout_order_review' ); ?>
            </div>

            <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
        </div>
    </div>
</form>

<?php

// ...

?>




<?php get_footer()?>