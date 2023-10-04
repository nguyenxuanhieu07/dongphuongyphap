<?php 
$option_name = 'hotline_options';
$hotline_check = rwmb_meta( 'hotline_post_status', array( 'object_type' => 'setting' ), $option_name );

$hotline = tdt_hotline();
$messenger = tdt_messenger();
$zalo = tdt_zalo();
?>
<?php if( $hotline_check != null && isset($hotline_check) ){ ?>

	<?php if( $messenger != null && isset($messenger) ){ ?>
		<div class="live-chat-messenger">
			<a href="<?php echo $messenger; ?>" target="_blank" rel="noopener">
			</a>
		</div>
	<?php } ?>

	<?php if( $hotline != null && isset($hotline) ){ ?>
		<a class="box-hotline" href="tel:<?php echo $hotline; ?>">
			<p class="circle-hotline">
				<span class="icon"><i class="fa fa-phone"></i></span>
			</p>
		</a>
	<?php } ?>

	<?php if( $zalo != null && isset($zalo) ){ ?>
		<a class="live-chat-zalo" href="https://zalo.me/<?php echo $zalo; ?>" target="_blank" rel="noopener">
		</a>
	<?php } ?>

<?php } ?>