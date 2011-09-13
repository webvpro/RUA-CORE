/**
 * @author mike
 */

/*table config*/
$().mXMLTable.addCellFormater({
				id:'LastStatusCell',
				format:function(xml,cell,opts){
					var list = $(cell).find('ul').clone();
					listOpts = $(cell).metadata({type:'attr',name:'col_data'})
					lastStatus=$(xml).find(listOpts.node)
					locInfo = lastStatus.find('City').text() + ' ' + lastStatus.find('State').text() +',' + lastStatus.find('PostalCode').text()
					var nList = document.createElement('ul');
					nList.className=list.attr('class');
					list.find('li').each(function(lint){
						tli= $(this)
						liOpts = tli.metadata({type:'attr',name:'col_data'})
						var li = document.createElement('li');
						li.className = tli.attr("class");
						if(tli.hasClass('status-description')){
							tLink=tli.find('a')
							var link= document.createElement('a');
							link.href="#";
							link.className=tLink.attr('class');
							link.setAttribute('statusCode',lastStatus.find('StatusCode').text());
							link.setAttribute('clientId',lastStatus.find('ClientId').text());
							link.setAttribute('shipmentId',$(xml).find('ShipmentId').text());
							linkTxt=document.createTextNode(lastStatus.find('Status').text());
							link.appendChild(linkTxt);
							li.appendChild(link);
						}else if(tli.hasClass('actual-date')){
							lbl = document.createElement('span');
							lblTxt =document.createTextNode(tli.find('span').text());
							lbl.appendChild(lblTxt);
							li.appendChild(lbl);
							li.appendChild(document.createTextNode(lastStatus.find(liOpts.dspNode).text()));
						}else if(tli.hasClass('location-address')){
							//alert(liOpts.dspNode)
							li.appendChild(document.createTextNode(eval(liOpts.dspNode)));
						} else {
							li.appendChild(document.createTextNode(lastStatus.find(liOpts.dspNode).text()));
						}
						//li.appendChild()
						nList.appendChild(li)
						
					})
					//alert('CALL')
					return nList;
					
				}
			});
			$().mXMLTable.addCellFormater({
				id:'EventCell',
				format:function(xml,cell,opts){
					var list = $(cell).find('ul').clone();
					listOpts = $(cell).metadata({type:'attr',name:'col_data'})
					shipEvent=$(xml).find(listOpts.node)
					locInfo = shipEvent.find('City').text() + ' ' + shipEvent.find('State').text() +',' + shipEvent.find('PostalCode').text();
					var nList = document.createElement('ul');
					nList.className=list.attr('class');
					list.find('li').each(function(lint){
						tli= $(this)
						liOpts = tli.metadata({type:'attr',name:'col_data'})
						var li = document.createElement('li');
						li.className = tli.attr("class");
						if(tli.hasClass('planned-date') || tli.hasClass('actual-date')){
							lbl = document.createElement('span')
							lblTxt =document.createTextNode(tli.find('span').text())
							lbl.appendChild(lblTxt)
							li.appendChild(lbl);
							liTxt =document.createTextNode(shipEvent.find(liOpts.dspNode).text())
							li.appendChild(liTxt);
						}else if(tli.hasClass('location-address')) {
							li.appendChild(document.createTextNode(eval(liOpts.dspNode)))
						}else{
							li.appendChild(document.createTextNode(shipEvent.find(liOpts.dspNode).text()));
						}
						//li.appendChild()
						nList.appendChild(li)
						
					})
					//alert('CALL')
					return nList;
					
				}
			});
			$().mXMLTable.addCellFormater({
				id:'LinkCell',
				format: function(xml,cell,opts){
					xml = $(xml)
					clientId= xml.find('ClientId').text();
					loadId= $(xml).find('Load').text();
					shipId= $(xml).find('ShipmentId').text();
					td = $(cell);
					tLink=td.find('a');
					cOpts=td.metadata({type:'attr',name:'col_data'})
					nLink = document.createElement('a');
					nLink.className=tLink.attr('class');
					nLink.setAttribute('clientId',clientId);
					nLink.setAttribute('loadId',loadId);
					nLink.setAttribute('ShipmentId',shipId);
					nLink.href="#";
					txt= document.createTextNode($(xml).find(cOpts.dspNode).text());
					nLink.appendChild(txt);
					return nLink
				}
			});
	/* eof table config*/