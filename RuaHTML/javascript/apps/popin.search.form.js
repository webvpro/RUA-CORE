/**
 * @author Michael Stanley
 */



$(window).load(function(){
	
	//events
 	$(".search-trigger").click(function(){
		$("#search-form-panel").toggle("fast");
		$(this).toggleClass("open");
		$(this).siblings().toggle("fast")
		return false;
	});
	$('.remove').live('click',function(e){
		$this=$(e.target);
		$wraper=$this.parent().parent();
		$this.parent().remove();
		if ($wraper.find('span').length === 0){
			$wraper.find('input').css("top", 0);
		}
		
	});
	$(".tagWrap").click(function(e){
		$this = $(e.target)
		//focus 'to' field
		$this.find('input').focus();
	});
   // wigits 
   
   // sliders	
   $( "#slider-percent-range" ).slider({
			range: true,
			min: 0,
			max: 100,
			values: [ 0, 100 ],
			slide: function( event, ui ) {
				$( "#find-resuse-percent-range" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
			}
		});
	$( "#find-resuse-percent-range" ).val( $( "#slider-percent-range" ).slider( "values", 0 ) +	" - " + $( "#slider-percent-range" ).slider( "values", 1 ) );

	 $( "#slider-price-range" ).slider({
			range: true,
			min: 10,
			max: 1000,
			values: [ 10, 1000 ],
			slide: function( event, ui ) {
				$( "#find-resuse-price-range" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
			}
		});
	$( "#find-resuse-price-range" ).val( $( "#slider-price-range" ).slider( "values", 0 ) +	" - " + $( "#slider-price-range" ).slider( "values", 1 ) );
 // autocomplete ////
 
 //country
 $("#find-country").autocomplete({
		//define callback to format results
		source: function(req, add){
			$.post('/getcountries', req, function(data, textStatus) {
			  //textStatus contains the status: success, error, etc
			  //create array for response objects
				var suggestions = [];
				//process response
				$.each(data, function(i, val){								
					suggestions.push({value:val.country,id:val.code});
				});
				//pass array to callback
				add(suggestions);
			}, "json");
		},
		minLength: 1,
		select: function(e, ui) {
			//create formatted tag
			$this = $(e.target);
			$('input#find-country-code').val(ui.item.id)
			
		}
	});
	
	$("#find-state").autocomplete({
		//define callback to format results
		source: function(req, add){
			
			$.post('/getstate', {'term':req.term,'country_code':$('input#find-country-code').val()}, function(data, textStatus) {
			  //textStatus contains the status: success, error, etc
			  //create array for response objects
				var suggestions = [];
				//process response
				$.each(data, function(i, val){								
					suggestions.push({value:val.stat_short_name,id:val.stat_iso_3166_2_state_code});
				});
				//pass array to callback
				add(suggestions);
			}, "json");
		},
		minLength: 1,
		select: function(e, ui) {
			//create formatted tag
			$this = $(e.target);
			$('input#find-state-code').val(ui.item.id);
		}
		
		
	});
	/// primary
	$("#find-item-primary-material").autocomplete({
		//define callback to format results
		source: function(req, add){
			$.post('/getmaterialtags', req, function(data, textStatus) {
			  //textStatus contains the status: success, error, etc
			  //create array for response objects
				var suggestions = [];
				//process response
				$.each(data, function(i, val){								
					suggestions.push({value:val.material,id:val.id});
				});
				//pass array to callback
				add(suggestions);
			}, "json");
		},
		//define select handler
		select: function(e, ui) {
			//create formatted tag
			$this = $(e.target)
			if (ui.item.id.length >0 && !hasItem($this)) {
				var mitem = ui.item.value,
				span = $("<span id='"+ui.item.id+"'>").text(mitem),
				a = $("<a>").addClass("remove").attr({
					href: "javascript:",
					title: "Remove " + mitem
				}).text("x").appendTo(span);
				//add item to container div
				span.insertBefore($this);
			};
			
		},
		close: function (e, ui) { 
			$(this).val('').focus(); 
		},
		change: function(e,ui) {
			$this.val("").css("top", 2);
		},
		open: function(e,ui){
			$val1= $('ul.ui-autocomplete > li:eq(0)');
			$val2=$('ul.ui-autocomplete > li:eq(1)');
			if($val1.text() == $val2.text() && $val2.length >0){
				$val1.remove();
			}
		}
	});
	// helpers
	function hasItem($input){
		$item=$input.parent('div').find('span:contains("'+$input.val()+'")')
		if ($item.length > 0){
			return true;
		}
		return false;
	}
	function set_tag_val($val,$input){
		$vals= $val.find('span');
		$rvals=[];
		$vals.each(function(idx){ 
			if($(this).attr('id')=== undefined){
				$copy =$(this).clone();
				$a= $copy.find('a');
				$a.remove();
				$rvals.push($copy.text());
			} else {
				$rvals.push($(this).attr('id'));
			}
			
		});
		$input.val($rvals.toString(','));
		
	}
});