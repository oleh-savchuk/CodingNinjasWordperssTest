<?php
/**
 * Displays footer site info
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<div class="site-info-mobile-contact">
    <span><button type="button" onclick="location.href = 'tel:0987654321'">Call Us</button></span>
    <span><button type="button" onclick="location.href = 'mailto:testdomain@mail.to?subject='">Email Us</button></span>
    <span><button type="button" onclick="location.href = '#openModal'">Contact Us</button></span>
</div><!-- .site-info-mobile-contact -->

<div class="site-info">
	<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentyseventeen' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentyseventeen' ), 'WordPress' ); ?></a>
</div><!-- .site-info -->

<div class="site-info-contact">
    <span>Call Us: 0987654321</span>
    <span>Email: <a href="mailto:testdomain@mail.to?subject=">testdomain@mail.to</a></span>
    <span><button type="button" onclick="location.href = '#openModal'">Contact Us</button></span>
</div><!-- .site-info-contact -->

<div id="openModal" class="modalDialog">
    <div>
        <a href="#close" title="Close" class="close">X</a>
        <h2>Contact Us</h2>
        <p>Call Us: 0987654321</p>
        <p>Email: testdomain@mail.to</p>
    </div>
</div>
