<a href="javascript:window.print()" class="printthis">Diese Seite drucken</a>

<?php if(isset($vars['orders']) && !empty($vars['orders'])): foreach($vars['orders'] as $pickup_range_from => $other): ?>
	<h1>Abholung am <?php echo date('d.m.Y', $pickup_range_from); ?> ab <?php echo date('H:i', $pickup_range_from); ?> Uhr</h1>
	<?php foreach($other as $fci_p => $another): ?>
		<h2>Logistiker: <?php $fci = field_collection_item_load($fci_p); $fcihe = $fci->hostEntity(); echo $fcihe->title; ?></h2>
		<?php foreach($another as $cuid => $orderobjects): ?>
			<h3>Kunde: <?php echo json_decode($cuid); ?></h3>
			<?php
				$header = array('Pos.', 'Bestell #', 'Menge', 'Produktname', 'Einzelpreis', 'Gesamt');
				$rows = array();
				foreach($orderobjects as $somekey=>$orderobject) {
					$productnode = node_load($orderobject->nid);

					$singleprice = str_replace('.', ',', regiomino_offer_get_tradingunit_moneyvalue($productnode, FALSE, TRUE, 'private', $orderobject->product_count, 'field_tu_gross') / $orderobject->product_count) . ' €';
					$totalprice = number_format(regiomino_offer_get_tradingunit_moneyvalue($productnode, FALSE, TRUE, 'private', $orderobject->product_count, 'field_tu_gross'), 2, ",", ".") . ' €';

					$row = array(
						$orderobject->order_id,
						$orderobject->shipping,
						$orderobject->product_count . ' x ' . $productnode->field_packingunit[LANGUAGE_NONE][0]['first'] . ' ' . t($productnode->field_packingunit[LANGUAGE_NONE][0]['second']),
						$productnode->title,
						$singleprice,
						$totalprice,
					);
					$rows[] = $row;
				}
				echo theme('table', array('header' => $header, 'rows' => $rows));
			?>
		<?php endforeach; ?>
	<?php endforeach; ?>
<?php endforeach; endif; ?>
<?php echo $vars['pager']; ?>