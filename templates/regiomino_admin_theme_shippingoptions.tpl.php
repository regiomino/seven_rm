<?php echo $vars['output'] . $vars['pager']; ?>

<div class="map-wrapper">
	<h2>Karte der Lieferstrecke <?php echo $vars['fci']->field_metro_name[LANGUAGE_NONE][0]['value']; ?></h2>
	<div id="map" style="height: 500px"></div>
</div>