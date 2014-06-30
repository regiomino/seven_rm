<?php echo $vars['output'] . $vars['pager']; ?>

<?php if(isset($vars['fci']->field_metro_name[LANGUAGE_NONE][0]['value'])): ?>
	<div class="map-wrapper">
		<h2>Karte der Lieferstrecke <?php echo $vars['fci']->field_metro_name[LANGUAGE_NONE][0]['value']; ?></h2>
		<p>ROT: Abhol-PLZ<br />
		GRÜN: Liefer-PLZ</p>
		<div id="map" style="height: 500px"></div>
	</div>
<?php endif; ?>