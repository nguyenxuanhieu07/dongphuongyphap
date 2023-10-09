<?php
$infrastructure = rwmb_meta('infrastructure-images') ? rwmb_meta('infrastructure-images') : '';
?>
<h2 class="archive-title">Cơ Sở Vật Chất</h2>
<div class="basis-infrastructure">
	<?php
	$count = count($infrastructure);
	$i = 0;
	foreach ($infrastructure as $key => $value) {
		if ($i = 0) {
			?>
			<div class="infrastructure-item">
				<img src="<?php echo $value['full_url']; ?>" alt="">
			</div>
			<div class="row list-infrastructure">
				<?php
		} elseif ($i > 0 && $i < $count - 1) {
			?>
				<div class="col-4 item">
					<div class="inner">
						<img src="<?php echo $value['full_url']; ?>" alt="">
					</div>
				</div>
				<?php
		} elseif ($i == $count - 1) {
			?>
				<div class="col-4 item">
					<div class="inner">
						<img src="<?php echo $value['full_url']; ?>" alt="">
					</div>
				</div>
			</div>
			<?php
		}
		$i++;
	}
	?>
</div>