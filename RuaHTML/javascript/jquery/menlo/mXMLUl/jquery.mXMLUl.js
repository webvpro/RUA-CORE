//mXMLUl plug-in ver 0.001
// by michael stanley
//started 03/12/2009
/*
 * 
 * 
 * 
 * @param {Object} xml (this is the xml data)
 * @param {Object} options
 * options{
 * 	
 * }
 */
(function($) {
					  
					  $.fn.mXMLUl = function(xml,options) {
					 		// build main options before element iteration
					 		var opts = $.extend({}, $.fn.mXMLUl.defaults, options);
							
							var cached = false;
					 		
							
							return this.each(function() {
					   				$listUl = $(this);
					   				// build element specific options
									var o = $.meta ? $.extend({}, opts, list.data()) : opts;
					   				// clone  Table template
									var $listItem = $listUl.find('li:first;').clone(true); 
									
									$listUl.find('li').remove();
									
									
									$(xml).find($listUl.metadata({type:'attr',name:'xmlListNode'}).node).each(function(rInt){
										$rec = $(this);
										$listUl.append($listItem.clone(true));
										$listItem=$listUl.find('li:last');
										itemOpts= $listItem.metadata({type:'attr',name:'item_opts'});
										
										if(itemOpts.enumNode && itemOpts.enumPrepend){
											if(itemOpts.enumNode == 'each-append'){
												$listItem.attr('id',itemOpts.enumPrepend + rint)
											}else{
												$listItem.attr('id',itemOpts.enumPrepend + $rec.find(itemOpts.enumNode).text())
											}
										} 
										if(itemOpts.formater){
											var formatted = $.fn.mXMLUl.getItemFormater(itemOpts.formater).format($rec,$listItem,o)
										}else{
											var formatted = $.fn.mXMLUl.getItemFormater('text').format($rec,$listItem,o)
										}	
										
									//afterload callback function/
									if($.isFunction(o.afterload)){
										o.afterload(xml,$listUl);
									}
									
									}); //xml eof each
									
					   		});
							
					   		
					  };
					  
					  //  function to get custom formaters
					   $.fn.mXMLUl.getItemFormater = function(name){
							var l = $.fn.mXMLUl.defaults.itemFormaters.length;
							for(var i=0; i < l; i++) {
								if($.fn.mXMLUl.defaults.itemFormaters[i].id.toLowerCase() == name.toLowerCase() ) {
									return $.fn.mXMLUl.defaults.itemFormaters[i]; 
								}
							}
					   };
					   // this function adds custom formaters
					   $.fn.mXMLUl.addItemFormater = function(formater){
							$.fn.mXMLUl.defaults.itemFormaters.push(formater);
					   };
					   
					  //
					  // private function for debugging
					  //
						  function debug(label,$obj) {
						 		if (window.console && window.console.log)
						   		window.console.log('mXMLUl-'+ label +': ' + $obj);
						  };
						  // public functions
						  // default settings
						  
						  $.fn.mXMLUl.defaults = {
						 	xml: null,
							afterload: null,
							itemFormaters:[]
						 	};
							
							
					//
					// end of closure
					//
					basicText ={
						id:'text',
						format:function(xml,item,opts){
							item.html("");
							iOpts=item.metadata({type:'attr',name:'item_opts'})
							item.append($(xml).find(iOpts.node).text());
							return
						}
					}
					$().mXMLUl.addItemFormater(basicText);
					
			})(jQuery);