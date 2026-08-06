export default null;
/**
 * Modifying inner blocks for Product Collection block.
 *
 * This selection of products list collections appears when adding
 * `woocommerce/product-collection` block into post content.
 *
 * @link  https://github.com/woocommerce/woocommerce/tree/trunk/plugins/woocommerce/client/blocks/assets/js/blocks/product-collection/collections
 * @link  https://github.com/woocommerce/woocommerce/blob/trunk/docs/block-development/extensible-blocks/product-collection-block/register-product-collection.md
 *
 * @since    2.0.0
 * @version  2.0.1
 */

wp.domReady( () => {

	const
		wcBlock           = 'woocommerce/product-collection',
		wcVariations      = wp.blocks.getBlockVariations( wcBlock ),
		wcVariationNames  = [
			'woocommerce/product-collection/best-sellers',
			'woocommerce/product-collection/by-brand',
			'woocommerce/product-collection/by-category',
			'woocommerce/product-collection/by-tag',
			'woocommerce/product-collection/cart-contents',
			'woocommerce/product-collection/cross-sells',
			'woocommerce/product-collection/featured',
			'woocommerce/product-collection/hand-picked',
			'woocommerce/product-collection/new-arrivals',
			'woocommerce/product-collection/on-sale',
			'woocommerce/product-collection/product-catalog', // WC file is named `product-collection.tsx`, but the collection name is `product-catalog`, indeed.
			'woocommerce/product-collection/related',
			'woocommerce/product-collection/top-rated',
			'woocommerce/product-collection/upsells',
		],
		wcProductTemplate = [
			'woocommerce/product-template',
			{},
			[ [ 'core/pattern', { slug: 'ileana/shop/product-item-hidden' } ] ]
		];

	if ( undefined !== wcVariations ) {
		wcVariations.forEach( ( variation ) => {
			if ( wcVariationNames.includes( variation.name ) ) {

				// The only way to modify variation is to unregister it first.
				wp.blocks.unregisterBlockVariation( wcBlock, variation.name );

				// Modify columns and number of items.
				if ( 5 === variation.attributes.displayLayout.columns ) {
					variation.attributes.displayLayout.columns = 4;
					variation.attributes.query.perPage         = 4;
				}

				// Set wide alignment.
				variation.attributes.align = 'wide';

				// Then modify its setup object.
				if ( 'woocommerce/product-template' === variation.innerBlocks[0][0] ) {

					// Most of the predefined variations has a Heading block first,
					// except the `product-catalog` variation, where the Product
					// Template block is the first one.
					variation.innerBlocks[0] = wcProductTemplate;

				} else if ( 'woocommerce/product-template' === variation.innerBlocks[1][0] ) {

					// We are jumping over the first Heading block
					// and modifying the second Product Template block.
					variation.innerBlocks[1] = wcProductTemplate;
				}

				// And finally re-register the variation with modified setup object.
				wp.blocks.registerBlockVariation( wcBlock, variation );
			}
		} );
	}
} );
