<?php
	$header = array('Pos.', 'Bestell #', 'Kunde', 'Menge', 'Produktname', 'Einzelpreis', 'Gesamt', 'Abholung', 'Abholung durch', 'Status');
	$rows = array();
	foreach($vars['orders'] as $somekey=>$orderobject) {
		$productnode = node_load($orderobject->nid);
		$singleprice = (float)$orderobject->product_price . ' €';
		$totalprice = $orderobject->product_price * $orderobject->product_count . ' €';
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
			t($orderobject->order_status),
		);
		$rows[] = $row;
	}
	echo theme('table', array('header' => $header, 'rows' => $rows)) . $vars['pager'];
?>