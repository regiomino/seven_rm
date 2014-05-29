<?php 
//$vars['sortedforpickup'][$pickuprange][$pickupaddress][$pickupname][$recipientaddress][$recipientname][$orderid]['nid']...['title']...['amount']
?>

<?php foreach($vars['sortedforpickup'] as $pickuprange=>$depth1): ?>
	<?php $pickup_range = explode('-', $pickuprange); ?>
	<?php $pickup_from = date('d.m.Y H:i', $pickup_range[0]); ?>
	<?php $pickup_to = date('H:i', $pickup_range[1]); ?>
	<div class="view-grouping">
	<div class="view-grouping-header">
		Abholungen: <?php echo $pickup_from . ' - ' . $pickup_to; ?>
	</div>
	<div class="view-grouping-content">
	<?php foreach($depth1 as $pickupaddress=>$depth2): ?>
		<?php $pickupaddress = json_decode($pickupaddress); ?>
<!-- 		<div class="view-grouping">
		<div class="view-grouping-header">
			Abholung von: <?php echo $pickupaddress; ?>
		</div>
		<div class="view-grouping-content"> -->
		<?php foreach($depth2 as $pickupname=>$depth3): ?>
			<?php $pickupname = json_decode($pickupname); ?>
			<div class="view-grouping">
			<div class="view-grouping-header">
				durch: <?php echo $pickupname; ?>
			</div>
			<div class="view-grouping-content">
			<?php foreach($depth3 as $recipientaddress=>$depth4): ?>
				<?php $recipientaddress = json_decode($recipientaddress); ?>
				<!-- <div class="view-grouping">
				<div class="view-grouping-header">
					Lieferung an: <?php echo $recipientaddress; ?>
				</div>
				<div class="view-grouping-content"> -->
				<?php foreach($depth4 as $recipientname=>$depth5): ?>
					<?php $recipientname = json_decode($recipientname); ?>
					<table class="views-table">
					<caption>Produkte von: <?php echo $recipientname; ?></caption>
					<thead>
					<tr>
						<th class="views-field-nid">Art.#</th>
						<th class="views-field-title">Bezeichnung</th>
						<th class="views-field-field-packingunit">Menge</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach($depth5 as $orderid=>$values): ?>
						<tr>
							<td><?php echo $values['nid']; ?></td>
							<td><?php echo $values['title']; ?></td>
							<td><?php echo $values['amount']; ?></td>
						</tr>
					<?php endforeach; ?>
					</tbody>
					</table>
				<?php endforeach; ?>
<!-- 				</div>
				</div> -->
			<?php endforeach; ?>
			</div>
			</div>
		<?php endforeach; ?>
<!-- 		</div>
		</div> -->
	<?php endforeach; ?>
	</div>
	</div>
<?php endforeach; ?>
