//mXMLTable plug-in ver 0.001
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
					  
					  $.fn.mXMLTable = function(xml,options) {
					 		// build main options before element iteration
					 		var opts = $.extend({}, $.fn.mXMLTable.defaults, options);
							
							var cached = false;
					 		
							
							return this.each(function() {
					   				tbl = $(this);
					   				// build element specific options
									var o = $.meta ? $.extend({}, opts, tbl.data()) : opts;
					   				// clone  Table template
									var tBody = tbl.find('tbody').clone(); 
									var tRow = tBody.find('tr:first').clone(); 
									var tCells = tRow.find('td').clone();
									
									// remove template from the dom
									//tRow.find('td').remove(); 
									tbl.find('tbody').remove();
									//tBody.find('tr').remove();
									
									var nBody = document.createElement('tbody');
									$(xml).find(tRow.metadata({type:'attr',name:'xmlListNode'}).node).each(function(rInt){
										$rec = $(this);
										var nRow = document.createElement('tr');
											
										$(tCells).each(function(cInt){
											$td= $(this)
											nTd = document.createElement('td');
											tdOpts= $td.metadata({type:'attr',name:'col_data'})
											if(tdOpts.formater){
												// this is a custom formater
												var formatted = $.fn.mXMLTable.getCellFormater(tdOpts.formater).format($rec,$td,o)
												nTd.appendChild(formatted);
											}else{
												// this just displays the xml node 
												nTd.appendChild(document.createTextNode($rec.find(tdOpts.node).text()))
											}
											//add cell to row
											nRow.appendChild(nTd)
											
										});
										//add row to tbody
										nBody.appendChild(nRow)
										
									});
									// add tbody to table and the dom;
									tbl.append(nBody)
									tbl.find('tbody').prepend(tRow);
									tbl.find('tbody tr:first').hide();
									//afterload callback function/
									if($.isFunction(o.afterload)){
										o.afterload(xml,tbl);
									}
									
									
					   		});
							
					   		
					  };
					  
					  //  function to get custom formaters
					   $.fn.mXMLTable.getCellFormater = function(name){
							var l = $.fn.mXMLTable.defaults.cellFormaters.length;
							for(var i=0; i < l; i++) {
								if($.fn.mXMLTable.defaults.cellFormaters[i].id.toLowerCase() == name.toLowerCase() ) {
									return $.fn.mXMLTable.defaults.cellFormaters[i]; 
								}
							}
					   };
					   // this function adds custom formaters
					   $.fn.mXMLTable.addCellFormater = function(formater){
							$.fn.mXMLTable.defaults.cellFormaters.push(formater);
					   };
					   
					  //
					  // private function for debugging
					  //
						  function debug(label,$obj) {
						 		if (window.console && window.console.log)
						   		window.console.log('mXMLTable-'+ label +': ' + $obj);
						  };
						  // public functions
						  // default settings
						  
						  $.fn.mXMLTable.defaults = {
						 	xml: null,
							afterload: null,
							cellFormaters:[]
						 	};
							
							
					//
					// end of closure
					//
			})(jQuery);