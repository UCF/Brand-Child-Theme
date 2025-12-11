<?php

namespace BrandChildTheme\Includes\Header;

function ucf_bct_get_header_content_markup( $retval, $obj ) {
	$header_type         = \ucfwp_get_header_type( $obj );
	$videos              = \ucfwp_get_header_videos( $obj );
	$exclude_nav         = get_field( 'page_header_exclude_nav', $obj );
	$header_content_type = \ucfwp_get_header_content_type( $obj );

	// If this is a media header, return early.
	if ( $header_type === 'media' ) return $retval;

	$default_header_desktop = get_theme_mod( 'default_header_desktop', null );
	$default_header_mobile  = get_theme_mod( 'default_header_mobile', null );

	if ( ! $default_header_desktop ) return $retval;

	ob_start();
?>
<div class="header-media header-media-compact mb-0 d-flex flex-column">
	<div class="header-media-background-wrap">
		<div class="header-media-background media-background-container">
			<picture class="media-background-picture">
				<source srcset="<?php echo $default_header_desktop; ?>" media="(min-width: 576px)">
				<source srcset="<?php echo $default_header_mobile; ?>" media="(max-width: 575px)">
				<img class="media-background object-fit-cover" src="<?php echo $default_header_desktop; ?>" alt="" data-object-fit="left, top" />
			</picture>
		</div>
	</div>
	<?php
	// Display the site nav
	if ( !$exclude_nav ) { echo \ucfwp_get_nav_markup(); }
	?>
	<div class="header-content">
		<div class="header-content-flexfix">
			<?php echo \ucfwp_get_header_content_markup(); ?>
		</div>
	</div>
	<?php if ( $videos || $header_content_type === 'title_subtitle' ): ?>
	<div class="header-media-controlfix"></div>
	<?php endif; ?>

</div>
<?php
	$retval = ob_get_clean();

	return $retval;
}

add_filter( 'ucfwp_get_header_markup', __NAMESPACE__ . '\ucf_bct_get_header_content_markup', 10, 2 );

/**
 * Overrides the default content type
 *
 * @author Jim Barnes
 * @since 0.3.0
 *
 * @param string $retval The return value from the primary function
 * @param mixed $obj A queried object (e.g. WP_Post, WP_Term) or null
 * @return string The content type name
 */
function ucf_bct_get_header_content_type( $retval, $obj ) {
	$content_type = get_field( 'page_header_content_type', $obj ) ?: '';
	$header_type  = \ucfwp_get_header_type( $obj );

	if ( $header_type === '' && $content_type === 'title_subtitle' ) {
		$retval = 'title_subtitle';
	}

	return $retval;
}

add_filter( 'ucfwp_get_header_content_type', __NAMESPACE__ . '\ucf_bct_get_header_content_type', 10, 2 );
