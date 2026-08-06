<?php
/**
 * The list of patterns within categories.
 *
 * This is a helper file which is requested in `includes/Content/Block_Pattern.php`.
 *
 * We also need to prevent WordPress "Doing it wrong" message here:
 * 	Title:    Hidden patterns index
 * 	Slug:     ileana/hidden-patterns-index
 * 	Inserter: no
 * @see  https://developer.wordpress.org/reference/classes/wp_theme/get_block_patterns/
 *
 * @package    Ileana
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  2.0.0
 *
 * @param  array $pattern_ids  This is being used in `includes/Content/Block_Pattern.php` file.
 */

$pattern_ids = array(

	'call-to-action' => array(
		'cta-01',
		'cta-02',
		'cta-03',
		'cta-04',
		'cta-05',
		'cta-06',
		'cta-07',
		'cta-08',
		'cta-09',
		'cta-10',
		'cta-11',
		'cta-12',
		'cta-13',
		'cta-14',
		'cta-15',
		'cta-16',
		'cta-17',
		'cta-18',
		'cta-18-alt-hidden',
	),

	'columns' => array(
		'columns-01',
		'columns-02',
		'columns-03',
	),

	'contact' => array(
		'contact-01',
		'contact-02',
		'contact-03',
		'contact-04',
		'contact-05',
		'contact-06',
		'contact-07',
	),

	'faq' => array(
		'faq-01',
		'faq-02',
		'faq-03',
		'faq-04',
		'faq-05',
		'faq-06',
	),

	'gallery' => array(
		'gallery-01',
		'gallery-02',
		'gallery-03',
		'gallery-04',
		'gallery-05',
		'gallery-06',
		'gallery-07',
		'gallery-08',
		'gallery-09',
		'gallery-10',
		'gallery-11',
		'gallery-12',
		'gallery-13',
		'gallery-14',
		'gallery-15',
	),

	'intro' => array(
		'intro-01',
		'intro-02',
		'intro-03',
		'intro-04',
		'intro-05',
		'intro-06',
		'intro-07',
		'intro-08',
		'intro-09',
		'intro-10',
		'intro-11',
		'intro-12',
		'intro-13',
		'intro-14',
		'intro-14-alt-hidden',
		'intro-15',
		'intro-16',
		'intro-17',
		'intro-18',
		'intro-19',
	),

	'media' => array(
		'media-01',
		'media-02',
		'media-03',
		'media-04',
		'media-05',
		'media-06',
		'media-07',
		'media-08',
		'media-09',
		'media-10',
		'media-11',
	),

	'numbers' => array(
		'numbers-01',
		'numbers-02',
		'numbers-03',
		'numbers-04',
		'numbers-05',
		'numbers-06',
		'numbers-07',
	),

	'page' => array(

		'home-1',
		'home-2',
		'home-3',
		'home-4',
		'home-5',
		'home-6',
		'home-7',

		'portfolio-1',
		'portfolio-2',
		'project-1',
		'project-2',

		'gallery-1',
		'gallery-2',

		'services-1',
		'services-2',
		'service-1',
		'service-2',

		'contact-1',
		'contact-2',

		'about-1',
		'about-2',
		'about-3',

		'team-1',
		'team-2',

		'pricing-1',
		'pricing-2',

		'testimonials-1',
		'testimonials-2',

		'faq-1',
		'faq-2',

		'soon-1',

		'woocommerce-cart',
		'woocommerce-checkout',
		'woocommerce-myaccount',
		'woocommerce-order-tracking',
		'woocommerce-shop',
	),

	'portfolio' => array(
		'portfolio-01',
		'portfolio-02',
		'portfolio-03',
		'portfolio-04',

		'portfolio-00',
	),

	'posts' => array(
		'posts-01',
		'posts-02',
		'posts-03',
		'posts-04',
		'posts-05',

		'posts-00',
		'posts-item-special-hidden',
	),

	'pricing' => array(
		'pricing-01',
		'pricing-02',
	),

	'services' => array(
		'services-01',
		'services-02',
		'services-03',
		'services-04',
		'services-05',
		'services-06',
		'services-07',
		'services-08',
		'services-09',
		'services-10',
		'services-11',
		'services-12',
	),

	'shop' => array(
		'shop-01',
		'shop-02',
		'shop-03',
		'shop-04',
		'shop-07',

		'sidebar',

		'shop-00',
		'product-item-hidden',
	),

	'site' => array(
		'comments',
		'content-404',
		'content-with-sidebar',
		'entry-meta-bottom',
		'entry-navigation',
		'entry-query',
		'entry-query-alt',
		'entry-query-featured',
		'footer',
		'footer-centered',
		'footer-minimal',
		'header',
		'header-mobile',
		'header-alt',
		'header-overlaid',
		'header-overlaid-mobile',
		'header-overlaid-alt',
		'intro',
		'intro-archive',
		'intro-blog',
		'intro-post',
		'intro-search',
		'media-header',
		'query',
		'query-alt',
		'query-search',
		'query-featured',
		'query-with-sidebar',
		'query-alt-with-sidebar',
		'sidebar',
		'taxonomy-category-select',

		'navigation-overlay',

		'woocommerce-archive-product',
		'woocommerce-single-product',
		'woocommerce-order-confirmation',
	),

	'team' => array(
		'team-01',
		'team-02',
		'team-03',
		'team-04',
		'team-05',
		'team-06',

		'team-00',
	),

	'template' => array(
		'404',
		'archive',
		'archive-with-sidebar',
		'custom-with-sidebar',
		'home',
		'home-with-sidebar',
		'page',
		'search',
		'search-post-type',
		'single',
	),

	'testimonials' => array(
		'testimonials-01',
		'testimonials-02',
		'testimonials-03',
		'testimonials-04',
		'testimonials-05',
		'testimonials-06',
		'testimonials-07',
	),

	'text' => array(

		'heading-01',
		'heading-02',
		'heading-03',

		'text-01',
		'text-02',
		'text-03',
		'text-04',
		'text-05',
		'text-06',
		'text-07',
		'text-08',
		'text-09',
		'text-10',
		'text-11',

		'tnc-01',
	),
);
