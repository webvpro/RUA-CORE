/**
 * @author mike stanley
 * jQuery plug-inc mXMLSelect
 * version 0.0.1
 * usage
 * $('get-selectboxes').mXMLSelect(opts);
 *  opts = {
 *@ 			xmlServiceURL: '/path/to/service',  
 *@				xmlServiceParams:{clientId:"10"},
 *@				xmlNodeList:'list',   ... xml node that contains list
 *@				xmlNode:'node',       ... node used for option values and text
 *@				xmlNodeVal:'nodeValue', ...node that contains option value
 *@				xmlNodeText:'nodeText', ... node that contains option text
 *@				xmlAsync:false, ... beware this change ajax call to Async don't change unless using callback
 *@			 	callback: function(xml){ do stuff} ... this callback uns after ajax success 
 *  		}
 * 
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
						//alert($this.attr('id'))
						var o = $.meta ? $.extend({}, opts, $this.data()) : opts;
		   				// getXML
						if(getXML == null){
							getXML =$.fn.mXMLSelect.getXMLService(o).responseXML;
							
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
							params: o.xmlServiceParams,
			    			dataType: 'xml',
			    			timeout: 1000,
							async:o.xmlAsync,
						    error: function(e){
								window.console.log(e)
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
				//alert($(xml).find(o.xmlNode).length)
				
				$(xml).find(o.xmlNode).each(function(ni){
					sOpt= document.createElement('option');
					sOpt.value=$(this).find(o.xmlNodeVal).text();
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
				xmlNodeList:'list',
				xmlServiceParams:{},
				xmlNode:'node',
				xmlNodeVal:'nodeValue',
				xmlNodeText:'nodeText',
				xmlAsync:false,
				xmlData:null,
			 	callback: null
		  	   };
		//
		// end of closure
		//
})(jQuery);