<?php 
//$vars['sortedforpickup'][$pickuprange][$pickupaddress][$pickupname][$recipientaddress][$recipientname][$orderid]['nid']...['title']...['amount']
?>
<h2>Die Abholungen beginnen am genannten Tag um 8:00 Uhr und enden mit Beginn des selbst gewählten Auslieferzeitraums.</h2><h2>Die Lieferungen an Regiomino Points müssen bis zum Beginn der Point-Ausgabe erfolgen.</h2><p>Beispiel: Bei einem Lieferzeitraum von 14-18 Uhr ist die Abholzeit bei den Verkäufern 8:00 - 14:00 Uhr. Erfolgt die Lieferung nicht an einen Kunden, sondern an einen Regiomino Point, der Ausgabezeiten von 11:45 - 13:00, ist die Abholzeit bei den Verkäufern 8:00 - 11:45 Uhr.</p>
<?php foreach($vars['sortedforpickup'] as $pickupday=>$depth0): ?>
	<?php foreach($depth0 as $csvlinkseller=>$depth1): ?>
		<?php $pickup_from = date('d.m.Y', $pickupday); ?>
		<?php $csvlinkseller = json_decode($csvlinkseller); ?>
		<div class="view-grouping">
		<div class="view-grouping-header">
			Abholaufträge: <?php echo $pickup_from . ' (' . $csvlinkseller . ')'; ?>
		</div>
		<div class="view-grouping-content">
		<?php foreach($depth1 as $pickupaddress=>$depth2): ?>
			<?php $pickupaddress = json_decode($pickupaddress); ?>
			<div class="view-grouping">
			<div class="view-grouping-header">
				Abholung von: <?php echo $pickupaddress; ?>
			</div>
			<div class="view-grouping-content">
			<?php foreach($depth2 as $pickupname=>$depth3): ?>
				<?php $pickupname = json_decode($pickupname); ?>
				<div class="view-grouping">
				<div class="view-grouping-header">
					bei: <?php echo $pickupname; ?>
				</div>
				<div class="view-grouping-content">
				<?php foreach($depth3 as $recipientaddress=>$depth4): ?>
					<?php $recipientaddress = json_decode($recipientaddress); ?>
					<div class="view-grouping">
					<div class="view-grouping-header">
						Lieferung an: <?php echo $recipientaddress; ?>
					</div>
					<div class="view-grouping-content">
					<?php foreach($depth4 as $recipientname=>$depth5): ?>
						<?php $recipientname = json_decode($recipientname); ?>
						<table class="views-table">
						<caption>für: <?php echo $recipientname; ?></caption>
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
					</div>
					</div>
				<?php endforeach; ?>
				</div>
				</div>
			<?php endforeach; ?>
			</div>
			</div>
		<?php endforeach; ?>
		</div>
		</div>
	<?php endforeach; ?>
<?php endforeach; ?>
