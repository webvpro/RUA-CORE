/**
 * @author mike stanley
 * jQuery plug-inc mXMLSelect
 * version 0.0.1
 * usage
 * $('get-selectboxes').mXMLSelect(opts);
 *  opts = {
 *@ 			xmlServiceURL: '/path/to/service',  
 *@				xmlServiceParams:{clientId:"10"},
 *@				xmlNode:'node',       ... node used for option values and text
 *@				xmlNodeVal:'nodeValue', ...node that contains option value
 *@				xmlNodeText:'nodeText', ... node that contains option text
 *@				xmlAsync:false, ... beware this changes ajax call to Async don't change unless using callback
 *@				selectLink:'country-select',... this allows a filter param to be retrived from another select element
 *@			 	selectLinkParam:'country-code',... this is the parameter the selectLink parameter will popultate 
 callback: function(xml){ do stuff} ... this callback runs after ajax success 
 *  		}
 *     note to select a value you must add a attribute to your <select selected_val="theval">
 */
(function($) {
		  //mXMLSelect plug-in ver 0.001
		  // by michael stanley
		  //started 03/02/2009
		  $.fn.mXMLSelect = function(options) {
		 		//debug(this);
		 		// build main options before element iteration
		 		var opts = $.extend({}, $.fn.mXMLSelect.defaults, options);
				var cached = false;
		 		var getXML = opts.xmlData;
				
				return this.each(function() {
		   				$this = $(this);
		   				// build element specific options
						var o = $.meta ? $.extend({}, opts, $this.data()) : opts;
		   				// getXML
						if(getXML == null){
							getXML =$.fn.mXMLSelect.getXMLService(o).responseXML;
							
						}
						if($this.attr("selected_val") !=""){
							o.selectedVal = $this.attr("selected_val");
						}
						//populate dropdowns	
						$.fn.mXMLSelect.updateSelect($this.attr('id'),getXML,o);
						
		   		});
		   		
		  };
		  //
		  // private function for debugging
		  //
			  function debug($obj) {
			 		if (window.console && window.console.log)
			   		window.console.log('mXMLSelect selection count: ' + $obj.size());
			  };
			  // public functions
			  $.fn.mXMLSelect.getXMLService= function(opts){
						var o=opts; 
						xml= $.ajax({
			    			url: o.xmlServiceURL,
			    			type: 'POST',
							data: o.xmlServiceParams,
			    			dataType: 'xml',
			    			timeout: 1000,
							async:o.xmlAsync,
						    error: function(e){
								window.console.log(o)
						        alert('Error loading XML document');
								return null
						    },
						    success: function(xml){
						        // do something with xml
								if (jQuery.isFunction(o.callback)){
									o.callback(xml);
								}
								return $(xml)
								
								
							}
							
						});
						//window.console.log(xml)
						return xml
					};	// eof getServiceXML
			  //
			  // define and expose our format function
			  //
		  	  $.fn.mXMLSelect.updateSelect = function(selId,xml,opts) {
			  	
			  	var $selEle = $('#'+selId);
				var o = opts;
				if(o.clearFirstOptionOnLoad){
					$selEle.find('option').remove();
				}else{
					$selEle.find('option:gt(0)').remove();
				}
				
				$(xml).find(o.xmlNode).each(function(ni){
					sOpt= document.createElement('option');
					sOpt.value=$(this).find(o.xmlNodeVal).text();
					if(o.selectedVal != null && o.selectedVal == $(this).find(o.xmlNodeVal).text()){
						sOpt.setAttribute("selected","selected");
					}
					sOpt.appendChild(document.createTextNode($(this).find(o.xmlNodeText).text()));
					$selEle.append(sOpt);
				});
				
				return true;
			  };
			  
			  //
			  // plugin defaults
			  //
			  $.fn.mXMLSelect.defaults = {
			 	xmlServiceURL: '/',
				xmlData:null,
				xmlServiceParams:{},
				xmlNode:'node',
				xmlNodeVal:'nodeValue',
				xmlNodeText:'nodeText',
				xmlAsync:false,
				selectedVal:null,
			 	callback: null,
			 	clearFirstOptionOnLoad:false,
				selectLink:null,
				selectLinkParam:null
		  	   };
		//
		// end of closure
		//
})(jQuery);