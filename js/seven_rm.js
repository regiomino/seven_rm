jQuery(document).ready(function ($) {
 
	$("a.editablefield").live("click", function() {
    var parent = $(this).parent();
    $(this).replaceWith("<input class='" + $(this).attr("class") + "' type='text' size='3' value='" + $(this).attr("data-value") + "'>"); //closing angle bracket added
    parent.children(":text").focus();
    return false;
  });
	$("td :text").live("blur", function() {
    $(this).replaceWith("<a href='javascript:' class='" + $(this).attr("class") + "' data-value='" + $(this).val() + "'>" + $(this).val() + "</a>");
		//trigger ajax and pass new stock value and nid
		
		data = new Object,
		callback_url = Drupal.settings.basePath + 'updatestock';
		
		var allclasses = $(this).attr("class").split(" ");
		var index;
		for (index = 0; index < allclasses.length; ++index) {
			if(allclasses[index].substring(0, 3) == 'nid') data['nid'] = allclasses[index].substring(3);
		}
		data['stock'] = $(this).val();  
		
		$.ajax({
			url: callback_url,
			type: 'POST',
			data: data,
			success: function (data, textStatus, jqXHR) {
			},
			error: function (http) {
			},
			complete: function() {
				console.log("complete");
			}
		});
		
  });
 
 
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