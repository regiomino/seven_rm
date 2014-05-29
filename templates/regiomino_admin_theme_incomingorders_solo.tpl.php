<?php
	$header = array('Pos.', 'Bestell #', 'Kunde', 'Menge', 'Produktname', 'Einzelpreis', 'Gesamt', 'Abholung', 'Abholung durch');
	$rows = array();
	foreach($vars['orders'] as $somekey=>$orderobject) {
		$productnode = node_load($orderobject->nid);
		$singleprice = str_replace('.', ',', regiomino_offer_get_tradingunit_moneyvalue($productnode, FALSE, TRUE, 'private', $orderobject->product_count, 'field_tu_gross') / $orderobject->product_count) . ' €';
		$totalprice = number_format(regiomino_offer_get_tradingunit_moneyvalue($productnode, FALSE, TRUE, 'private', $orderobject->product_count, 'field_tu_gross'), 2, ",", ".") . ' €';

		$fci = field_collection_item_load($orderobject->shipping_item[$orderobject->shipping]->fci_p);
		$fcihe = $fci->hostEntity();
		$row = array(
			$orderobject->order_id,
			$orderobject->shipping,
			$orderobject->delivery_first_name . ' ' . $orderobject->delivery_last_name . ' (' . $orderobject->uid . ')',
			$orderobject->product_count . ' x ' . $productnode->field_packingunit[LANGUAGE_NONE][0]['first'] . ' ' . t($productnode->field_packingunit[LANGUAGE_NONE][0]['second']),
			$productnode->title,
			$singleprice,
			$totalprice,
			date('d.m.Y', $orderobject->shipping_item[$orderobject->shipping]->pickup_range_from) . ' ab ' . date('H:i', $orderobject->shipping_item[$orderobject->shipping]->pickup_range_from) . ' Uhr',
			$fcihe->title,
		);
		$rows[] = $row;
	}
	echo theme('table', array('header' => $header, 'rows' => $rows)) . $vars['pager'];
?>