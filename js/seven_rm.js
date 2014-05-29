jQuery(document).ready(function ($) {
 
       $(".sidepanel").tocify({
              selectors: "h1.section-title,h2.sub-title",
              'showAndHideOnScroll' : false,
              'showAndHide' : false,
              'scrollTo' : 80,
              'highlightOffset' :100,
              'offsetElement' : $('#toolbar'),
              'sticky' : true,
              'stickyContainer' : $('.sticky-container')
              
            }).data("toc");
      
        var $checkboxRow = $('#edit-qualitylabels--2  .form-type-checkbox');
       
        $checkboxRow.each(function(){
             
            var _self = this;
            
            if ( $(_self).find('.form-checkbox').attr('checked') != undefined ) {
                $(_self).find('label').addClass('active');
            }
        });
        
        $checkboxRow.on('click', 'label', function(){
            var _self = this;
            $(_self).toggleClass('active');
             
        });
        
	Math.roundUpToFives = function(number, precision) {
		precision = Math.abs(parseInt(precision)) || 0;
		var coefficient = Math.pow(10, precision);
		return Math.ceil(number*coefficient)/coefficient;
	}
	$('#offer-node-form #edit-field-price #edit-field-price-und-0-value').keyup(function () {
		var inputval = $('#offer-node-form #edit-field-price #edit-field-price-und-0-value').val();
		var floatval = inputval.replace(',', '.');
		var resulting = Math.roundUpToFives((floatval * 1.1) * 2, 1) / 2;
		/* var revenue = Math.round((resulting - (floatval* 10 / 100)) * Math.pow(10, 2)) / Math.pow(10, 2); */
		$('#offer-node-form #edit-field-price .field-suffix').html('<span class="regio">Regio</span><span class="mino">mino</span> Preis: ' + resulting.toFixed(2).replace('.', ',') + ' &euro; inkl. Liefergeb&uuml;hr (<a id="pricedesctrigger" title="Regiomino erh&ouml;ht Ihren Produktpreis automatisch um &uuml;ber den Aufschlag die kostenlose Lieferung zu finanzieren." href="#">Was ist das?</a>)');
		console.log(resulting.toFixed(2).replace('.', ','));
	});
        
      
});