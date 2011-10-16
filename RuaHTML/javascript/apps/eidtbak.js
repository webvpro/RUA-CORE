/**
 * @author Michael Stanley
 */
/**
 * @author Michael Stanley
 */

$(function(){
	
	
	
	    				
	    					$("#item-name").alphanumeric({allow:"._-"});
	    					$("#item-description").alphanumeric({allow:".,  -_"});
							$("#item-resued-percent").numeric({allow:"."});
							$("#item-price").numeric({allow:"."});
							$(".taginput").alpha();
						
				
				//attach autocomplete
				$(".tagInput").autocomplete({
					
					//define callback to format results
					source: function(req, add){
						
						$.post('/getmaterialtags', req, function(data, textStatus) {
						 //alert($this.val());
						//create array for response objects
							var suggestions = [];
							//add the typed val
							suggestions.push({value:$this.val(),id:''})
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
						$this = $(e.target);
						if ( ui.item.id.length == 0 && !hasItem($this) ){
						  	var item = $this.val(),
							span = $("<span class='new-item'>").text(item),
							a = $("<a>").addClass("remove").attr({
								href: "javascript:",
								title: "Remove " + item
							}).text("x").appendTo(span);
							
						}else if(!hasItem($this)){
							var mitem = ui.item.value,
							span = $("<span>").text(mitem),
							a = $("<a>").addClass("remove").attr({
								href: "javascript:",
								title: "Remove " + mitem
							}).text("x").appendTo(span);
						}
						//add item to friend div
						span.insertBefore($this);
					},
					close: function (e, ui) { 
						$(this).val('').focus(); 
					},
					change: function(e) {
						$(this).val("").css("top", 2);
					}
				});
				
				function haveItem($input){
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
						
			});