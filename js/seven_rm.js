jQuery(document).ready(function ($) {
  
	$("a.editablefield").live("click", function() {
    var parent = $(this).parent();
    $(this).replaceWith("<input class='" + $(this).attr("class") + "' type='text' size='3' value='" + $(this).attr("data-value") + "'>"); //closing angle bracket added
    parent.children("input:text").focus();
    return false;
  });
	$("td input.editablefield").live("blur", function() {
            var $parent =  $(this).parent();
            $parent.addClass('loading');	
             
             $(this).replaceWith("<a href='javascript:' class='" + $(this).attr("class") + "' data-value='" + $(this).val() + "'>" + $(this).val() + "</a>");
                var $that = $(this);
                //trigger ajax and pass new stock value and nid
		
		data = new Object,
		callback_url = Drupal.settings.basePath + 'updateofferdata';
		
		var allclasses = $(this).attr("class").split(" ");
		var index;
		for (index = 0; index < allclasses.length; ++index) {
			if(allclasses[index].substring(0, 3) == 'nid') data['nid'] = allclasses[index].substring(3);
			if(allclasses[index].substring(0, 6) == 'field_') data['field'] = allclasses[index].substring(0);
		}
		data['amount'] = $(this).val();
		
		$.ajax({
			url: callback_url,
			type: 'POST',
			data: data,
			success: function (returnData, textStatus, jqXHR) {
				console.log(returnData);
				$("td.nid" + data['nid']).toggleClass('nid' + data['nid'] + ' nid' + returnData).html(returnData);
				$("a.nid" + data['nid']).toggleClass('nid' + data['nid'] + ' nid' + returnData).attr('href', '/admin/offers/edit/' + returnData + '?destination=admin/offers');
				$("div.form-item-offers-" + data['nid']).toggleClass('form-item-offers-' + data['nid'] + ' form-item-offers-' + returnData);
				$("label[for='edit-offers-" + data['nid'] + "']").attr('for', 'edit-offers-' + returnData);
				$("input[name='offers[" + data['nid'] + "]']").attr('name', 'offers[' + returnData + ']').attr('id', 'edit-offers-' + returnData).attr('value', returnData);
			},
			error: function (http) {
			},
			complete: function() {
        $parent.removeClass('loading');
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
	
	$('#edit-tradingprice-1-netrevenue--2').keyup(function () {
		$.fn.updateTradingpriceFields(1);
	});
	$('#edit-tradingprice-2-netrevenue--2').keyup(function () {
		$.fn.updateTradingpriceFields(2);
	});
	$('#edit-tradingprice-3-netrevenue--2').keyup(function () {
		$.fn.updateTradingpriceFields(3);
	});
	$('#edit-tradingprice-4-netrevenue--2').keyup(function () {
		$.fn.updateTradingpriceFields(4);
	});
	$('#edit-tradingprice-5-netrevenue--2').keyup(function () {
		$.fn.updateTradingpriceFields(5);
	});
	
	$('#edit-vat--2').change(function () {
		for(var i = 1; i<=5; i++) {
			$.fn.updateTradingpriceFields(i);
		}
	});
	
	$('#edit-tradingprice-1-customertype--2').change(function () {
		$.fn.updateTradingpriceFields(1);
	});
	$('#edit-tradingprice-2-customertype--2').change(function () {
		$.fn.updateTradingpriceFields(2);
	});
	$('#edit-tradingprice-3-customertype--2').change(function () {
		$.fn.updateTradingpriceFields(3);
	});
	$('#edit-tradingprice-4-customertype--2').change(function () {
		$.fn.updateTradingpriceFields(4);
	});
	$('#edit-tradingprice-5-customertype--2').change(function () {
		$.fn.updateTradingpriceFields(5);
	});
      
  $.fn.updateTradingpriceFields = function(row) {
		var customertype = $('#edit-tradingprice-' + row + '-customertype--2').val();
		var vatperc = $('#edit-vat--2').val();
		var inputval = $('#edit-tradingprice-' + row + '-netrevenue--2').val();
		var floatval = inputval.replace(',', '.');
		var rmshipping = (+floatval * 0.1).toFixed(2);
		if(customertype == 'commercial') {
			var rmfee = (+floatval * 0.1).toFixed(2);
		}
		else {
			var rmfee = (+floatval * 0.135).toFixed(2);
		}
		var rmlisting = (+floatval + +rmshipping + +rmfee).toFixed(2);
		var vat = (+rmlisting * +vatperc / 100).toFixed(2);
		var gross = (+rmlisting + +vat).toFixed(2);
		$('#edit-tradingprice-' + row + '-shipping--2').val(rmshipping.replace('.', ','));
		$('#edit-tradingprice-' + row + '-rmfee--2').val(rmfee.replace('.', ','));
		$('#edit-tradingprice-' + row + '-listing--2').val(rmlisting.replace('.', ','));
		$('#edit-tradingprice-' + row + '-vat--2').val(vat.replace('.', ','));
		$('#edit-tradingprice-' + row + '-gross--2').val(gross.replace('.', ','));
	}
      
});