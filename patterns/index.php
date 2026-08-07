<?php
/**
 * The list of patterns within categories.
 *
 * This is a helper file which is requested in `includes/Content/Block_Pattern.php`.
 *
 * We also need to prevent WordPress "Doing it wrong" message here:
 * 	Title:    Hidden patterns index
 * 	Slug:     zooey/hidden-patterns-index
 * 	Inserter: no
 * @see  https://developer.wordpress.org/reference/classes/wp_theme/get_block_patterns/
 *
 * @package    Zooey
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
	),

	'columns' => array(
		'columns-01',
		'columns-02',
		'columns-03',
		'columns-04',
	),

	'contact' => array(
		'contact-01',
		'contact-02',
		'contact-03',
		'contact-04',
		'contact-05',
	),

	'faq' => array(
		'faq-01',
		'faq-02',
		'faq-03',
		'faq-04',
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
	),

	'intro' => array(
		'intro-01',
		'intro-02',
		'intro-03',
		'intro-04',
		'intro-05',
		'intro-06',
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
		'custom-header-top',
		'custom-header-bottom',
	),

	'numbers' => array(
		'numbers-01',
		'numbers-02',
		'numbers-03',
		'numbers-04',
		'numbers-05',
	),

	'page' => array(
		'about-1',
		'contact-1',
		'faq-1',
		'gallery-1',
		'home-1',
		'home-2',
		'home-3',
		'portfolio-1',
		'project-1',
		'pricing-1',
		'services-1',
		'service-1',
		'soon-1',
		'team-1',
		'testimonials-1',
	),

	'portfolio' => array(
		'portfolio-01',
		'portfolio-02',
		'portfolio-03',

		'portfolio-00',
	),

	'posts' => array(
		'posts-01',
		'posts-02',
		'posts-03',

		'posts-00',
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
	),

	'site' => array(
		'comments',
		'content-404',
		'content-with-sidebar',
		'entry-meta-bottom',
		'entry-navigation',
		'entry-query',
		'entry-query-featured',
		'footer',
		'footer-centered',
		'footer-minimal',
		'header',
		'header-alt',
		'intro',
		'intro-archive',
		'intro-blog',
		'intro-post',
		'intro-search',
		'query',
		'query-search',
		'query-featured',
		'query-with-sidebar',
		'sidebar',
		'taxonomy-category-select',
	),

	'team' => array(
		'team-01',
		'team-02',
		'team-03',
		'team-04',

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
		'single',
	),

	'testimonials' => array(
		'testimonials-01',
		'testimonials-02',
		'testimonials-03',
		'testimonials-04',
	),

	'text' => array(

		'heading-01',
		'heading-02',
		'heading-03',

		'text-01',
		'text-02',
		'text-03',
		'text-04',
	),
);
