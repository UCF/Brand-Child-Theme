<?php
$obj           = ucfwp_get_queried_object();
$title         = ucfwp_get_header_title( $obj );
$subtitle      = ucfwp_get_header_subtitle( $obj );
$h1            = ucfwp_get_header_h1_option( $obj );
$h1_elem       = ucfwp_get_header_h1_elem( $obj );
$title_elem    = ( $h1 === 'title' ) ? $h1_elem : 'span';
$subtitle_elem = ( $h1 === 'subtitle' ) ? $h1_elem : 'span';
?>

<?php if ( $title ): ?>
	<div class="header-content-inner align-self-start pt-4 pt-sm-0 align-self-sm-center">
		<div class="container">
			<div class="d-inline-block bg-inverse p-4">
				<div class="framed-primary p-3">
					<<?php echo $title_elem; ?> class="header-title font-condensed text-uppercase"><?php echo $title; ?></<?php echo $title_elem; ?>>
					<?php if ( $subtitle ) : ?>
					<div class="clearfix"></div>
					<div class="d-inline-block">
						<<?php echo $subtitle_elem; ?> class="header-subtitle text-primary"><?php echo $subtitle; ?></<?php echo $subtitle_elem; ?>>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
