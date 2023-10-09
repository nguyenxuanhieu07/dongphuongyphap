<?php
$map_iframe  = rwmb_meta('map-iframe') ? rwmb_meta('map-iframe') : '';
$link_map    = rwmb_meta('map-link') ? rwmb_meta('map-link') : '';
$address     = rwmb_meta('page-basis-address') ? rwmb_meta('page-basis-address') : '';
$numberphone = rwmb_meta('page-basis-numberphone') ? rwmb_meta('page-basis-numberphone') : '';
?>
<h2 class="archive-title">Bản Đồ</h2>
<div class="page-map">
	<a href="<?php echo $link_map; ?>" class="map-link">Xem đường đi ngay</a>
	<div class="google-map">
		<?php echo $map_iframe; ?>
		<div class="map-address">
			<h3 class="address-title">Hệ thống cơ sở</h3>
			<div class="address-content">
				<a class="btn-address" data-toggle="collapse" href="#showaddress" role="button" aria-expanded="false"
					aria-controls="showaddress"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i>
					<?php echo $address; ?>
				</a>
				<div class="collapse multi-collapse" id="showaddress">
					<a href="#" class="number-phone">
						<span class="fa fa-phone"></span>
						<span>
							<?php echo $numberphone; ?>
						</span>
					</a>
					<a href="#" class="btn-book">Đặt hẹn ngay</a>
				</div>
			</div>
		</div>
	</div>
</div>