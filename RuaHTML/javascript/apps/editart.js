/**
 * @author Michael Stanley
 */

$(function(){
	$("#item-name").alphanumeric({allow:"._-"});
	$("#item-description").alphanumeric({allow:".,\"  -_"});
	$("#item-price, .dim-input").numeric({allow:"."});
	$("#item-quanity").numeric();
	$(".taginput").alpha({nocaps:true});
	$('#sell-link').button();
				
	//attach autocomplete
	$("#item-primary-material,#item-secondary-material,#item-other-material").autocomplete({
		//define callback to format results
		source: function(req, add){
			$.post('/getmaterialtags', req, function(data, textStatus) {
			  //textStatus contains the status: success, error, etc
			  //create array for response objects
				var suggestions = [];
				//add the typed val for new tag creation
				suggestions.push({value:req.term,id:''});
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
			if ( ui.item.id.length == 0 && !hasItem($this) && $this.val().length >=3){
			  	var item = $this.val(),
				span = $("<span class='new-item'>").text(item),
				a = $("<a>").addClass("remove").attr({
					href: "javascript:",
					title: "Remove " + item
				}).text("x").appendTo(span);
				//add item to container div
				span.insertBefore($this);
				
			} else if (ui.item.id.length >0 && !hasItem($this)) {
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
			console.log($(".ui-autocomplete li").size());

			$val1= $('ul.ui-autocomplete > li:eq(0)');
			
			$val2=$('ul.ui-autocomplete > li:eq(1)');
			
			if($val1.text() == $val2.text() && $val2.length >0){
				$val1.remove();
			}
		}
	});
	
	function hasItem($input){
		$item=$input.parent('div').find('span:contains("'+$input.val()+'")')
		if ($item.length > 0){
			return true;
		}
		return false;
	}
	//add click handler to friends div
	
	$(".tagWrap").click(function(e){
		$this = $(e.target)
		//focus 'to' field
		$this.find('input').focus();
	});
	
	//add live handler for clicks on remove links
	$('.remove').live('click',function(e){
		$this=$(e.target);
		$wraper=$this.parent().parent();
		$this.parent().remove();
		if ($wraper.find('span').length === 0){
			$wraper.find('input').css("top", 0);
		}
		
	});
	
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
	
	function prepareForm(){
		set_tag_val($('#primary-material'),$('#hidden-primary-material'));
		set_tag_val($('#secondary-material'),$('#hidden-secondary-material'));
		set_tag_val($('#other-material'),$('#hidden-other-material'));
	}
	$('.change-image').button();
	
	$('#submit-art-button').button().click(function(e){
		e.preventDefault();
		prepareForm();
		$('#enter-item-form').submit();
	});
  	
			
});//eof ready