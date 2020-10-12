var timer = setTimeout(function() {
	  window.location = window.location;
	}, 60000);
	$(function(){
	  $("#btn_auto_load").click(function(e){
	    e.preventDefault();
	    clearTimeout(timer);
	  });
	});


	function close_this_noti(noti_id){
		var id = parseInt(noti_id.substring(5));
		$.ajax({
			url:base_url+'cp/cdashboard/close_notification/'+id,
			dataType: 'json',
			success:function(response){

			}
		});
		$("#"+noti_id).parent('div').hide('slow');
	}
	var labeler_activated = false;


	function print_labeler(orders_id,type){

			$.ajax({
				url:base_url+'cp/orders/print_labeler/'+orders_id+'/'+type,
				dataType: 'json',
				success:function(response){

						if(response.error){
							alert(response.message);
						}else{
							if(response.message == 'array'){

								for(var j=0;j<response.data.length;j++){

									var content = response.data[j];
									// At webby
									//var template = "﻿<"+"?xml version=\"1.0\" encoding=\"utf-8\"?>\r\n<DieCutLabel Version=\"8.0\" Units=\"twips\"><PaperOrientation>Landscape</PaperOrientation><Id>WhiteNameBadge11356</Id><PaperName>11356 White Name Badge - virtual</PaperName><DrawCommands><RoundRectangle X=\"0\" Y=\"0\" Width=\"2340\" Height=\"5040\" Rx=\"270\" Ry=\"270\" /></DrawCommands><ObjectInfo><TextObject><Name>TEKST</Name><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /><BackColor Alpha=\"0\" Red=\"255\" Green=\"255\" Blue=\"255\" /><LinkedObjectName></LinkedObjectName><Rotation>Rotation0</Rotation><IsMirrored>False</IsMirrored><IsVariable>False</IsVariable><HorizontalAlignment>Left</HorizontalAlignment><VerticalAlignment>Top</VerticalAlignment><TextFitMode>None</TextFitMode><UseFullFontHeight>True</UseFullFontHeight><Verticalized>False</Verticalized><StyledText><Element><String>"+content.name+"\n\n</String><Attributes><Font Family=\"Arial\" Size=\"10\" Bold=\"True\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element><Element><String></String><Attributes><Font Family=\"Arial\" Size=\"10\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element><Element><String>"+content.extra+"</String><Attributes><Font Family=\"Arial\" Size=\"7\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element><Element><String></String><Attributes><Font Family=\"Arial\" Size=\"8\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element><Element><String>"+content.remark+"</String><Attributes><Font Family=\"Arial\" Size=\"7\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element></StyledText></TextObject><Bounds X=\"391\" Y=\"136.181823730469\" Width=\"3128.33227539063\" Height=\"2094.54541015625\" /></ObjectInfo><ObjectInfo><TextObject><Name>TEKST_1</Name><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /><BackColor Alpha=\"0\" Red=\"255\" Green=\"255\" Blue=\"255\" /><LinkedObjectName></LinkedObjectName><Rotation>Rotation0</Rotation><IsMirrored>False</IsMirrored><IsVariable>False</IsVariable><HorizontalAlignment>Right</HorizontalAlignment><VerticalAlignment>Top</VerticalAlignment><TextFitMode>ShrinkToFit</TextFitMode><UseFullFontHeight>True</UseFullFontHeight><Verticalized>False</Verticalized><StyledText><Element><String>€</String><Attributes><Font Family=\"Arial\" Size=\"8\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element><Element><String> "+content.amount+"</String><Attributes><Font Family=\"Arial\" Size=\"11\" Bold=\"True\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element></StyledText></TextObject><Bounds X=\"3255.87255859375\" Y=\"80.4545364379883\" Width=\"1472.72729492188\" Height=\"1767.27270507813\" /></ObjectInfo><ObjectInfo><TextObject><Name>TEXT</Name><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /><BackColor Alpha=\"0\" Red=\"255\" Green=\"255\" Blue=\"255\" /><LinkedObjectName></LinkedObjectName><Rotation>Rotation0</Rotation><IsMirrored>False</IsMirrored><IsVariable>False</IsVariable><HorizontalAlignment>Right</HorizontalAlignment><VerticalAlignment>Top</VerticalAlignment><TextFitMode>ShrinkToFit</TextFitMode><UseFullFontHeight>True</UseFullFontHeight><Verticalized>False</Verticalized><StyledText><Element><String>"+content.c_name+"</String><Attributes><Font Family=\"Arial\" Size=\"8\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element></StyledText></TextObject><Bounds X=\"2291.7817327326\" Y=\"1990.90909090909\" Width=\"2443.63636363636\" Height=\"250.909090909091\" /></ObjectInfo></DieCutLabel>";

									// At Live
									//var template = "﻿<"+"?xml version=\"1.0\" encoding=\"utf-8\"?>\r\n<DieCutLabel Version=\"8.0\" Units=\"twips\"><PaperOrientation>Landscape</PaperOrientation><Id>WhiteNameBadge11356</Id><PaperName>11356 White Name Badge - virtual</PaperName><DrawCommands><RoundRectangle X=\"0\" Y=\"0\" Width=\"2340\" Height=\"5040\" Rx=\"270\" Ry=\"270\" /></DrawCommands><ObjectInfo><TextObject><Name>TEKST</Name><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /><BackColor Alpha=\"0\" Red=\"255\" Green=\"255\" Blue=\"255\" /><LinkedObjectName></LinkedObjectName><Rotation>Rotation0</Rotation><IsMirrored>False</IsMirrored><IsVariable>False</IsVariable><HorizontalAlignment>Left</HorizontalAlignment><VerticalAlignment>Top</VerticalAlignment><TextFitMode>None</TextFitMode><UseFullFontHeight>True</UseFullFontHeight><Verticalized>False</Verticalized><StyledText><Element><String>"+content.name+" ("+content.default_price+" €)\n\n</String><Attributes><Font Family=\"Arial\" Size=\"10\" Bold=\"True\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element><Element><String></String><Attributes><Font Family=\"Arial\" Size=\"10\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element><Element><String>"+content.c_name+"\n\n</String><Attributes><Font Family=\"Arial\" Size=\"8\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element><Element><String></String><Attributes><Font Family=\"Arial\" Size=\"10\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element><Element><String>"+content.extra+"</String><Attributes><Font Family=\"Arial\" Size=\"7\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element><Element><String></String><Attributes><Font Family=\"Arial\" Size=\"8\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element><Element><String>"+content.remark+"</String><Attributes><Font Family=\"Arial\" Size=\"7\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element></StyledText></TextObject><Bounds X=\"391\" Y=\"136.181823730469\" Width=\"3128.33227539063\" Height=\"2094.54541015625\" /></ObjectInfo><ObjectInfo><TextObject><Name>TEKST_1</Name><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /><BackColor Alpha=\"0\" Red=\"255\" Green=\"255\" Blue=\"255\" /><LinkedObjectName></LinkedObjectName><Rotation>Rotation0</Rotation><IsMirrored>False</IsMirrored><IsVariable>False</IsVariable><HorizontalAlignment>Right</HorizontalAlignment><VerticalAlignment>Top</VerticalAlignment><TextFitMode>ShrinkToFit</TextFitMode><UseFullFontHeight>True</UseFullFontHeight><Verticalized>False</Verticalized><StyledText><Element><String>€</String><Attributes><Font Family=\"Arial\" Size=\"8\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element><Element><String> "+content.amount+"</String><Attributes><Font Family=\"Arial\" Size=\"11\" Bold=\"True\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element></StyledText></TextObject><Bounds X=\"3255.87255859375\" Y=\"80.4545364379883\" Width=\"1472.72729492188\" Height=\"1767.27270507813\" /></ObjectInfo></DieCutLabel>";
									//var template = "﻿<"+"?xml version=\"1.0\" encoding=\"utf-8\"?>\r\n<DieCutLabel Version=\"8.0\" Units=\"twips\"><PaperOrientation>Landscape</PaperOrientation><Id>WhiteNameBadge11356</Id><PaperName>11356 White Name Badge - virtual</PaperName><DrawCommands><RoundRectangle X=\"0\" Y=\"0\" Width=\"2340\" Height=\"5040\" Rx=\"270\" Ry=\"270\" /></DrawCommands><ObjectInfo><TextObject><Name>TEKST</Name><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /><BackColor Alpha=\"0\" Red=\"255\" Green=\"255\" Blue=\"255\" /><LinkedObjectName></LinkedObjectName><Rotation>Rotation0</Rotation><IsMirrored>False</IsMirrored><IsVariable>False</IsVariable><HorizontalAlignment>Left</HorizontalAlignment><VerticalAlignment>Top</VerticalAlignment><TextFitMode>ShrinkToFit</TextFitMode><UseFullFontHeight>True</UseFullFontHeight><Verticalized>False</Verticalized><StyledText><Element><String>"+content.name+" ("+content.default_price+" €)\n\n</String><Attributes><Font Family=\"Arial\" Size=\"10\" Bold=\"True\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element><Element><String></String><Attributes><Font Family=\"Arial\" Size=\"10\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element><Element><String>"+( (content.company != '')?content.company:'')+"\n</String><Attributes><Font Family=\"Arial\" Size=\"8\" Bold=\"True\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element><Element><String>"+content.c_name+"\n\n</String><Attributes><Font Family=\"Arial\" Size=\"8\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element><Element><String></String><Attributes><Font Family=\"Arial\" Size=\"10\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element><Element><String>"+content.extra+"</String><Attributes><Font Family=\"Arial\" Size=\"7\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element><Element><String></String><Attributes><Font Family=\"Arial\" Size=\"8\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element><Element><String>"+content.remark+"</String><Attributes><Font Family=\"Arial\" Size=\"7\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element><Element><String>"+content.extra_field_text+"</String><Attributes><Font Family=\"Arial\" Size=\"7\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element></StyledText></TextObject><Bounds X=\"391\" Y=\"136.181823730469\" Width=\"3828.33227539063\" Height=\"5040\" /></ObjectInfo><ObjectInfo><TextObject><Name>TEKST_1</Name><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /><BackColor Alpha=\"0\" Red=\"255\" Green=\"255\" Blue=\"255\" /><LinkedObjectName></LinkedObjectName><Rotation>Rotation0</Rotation><IsMirrored>False</IsMirrored><IsVariable>False</IsVariable><HorizontalAlignment>Right</HorizontalAlignment><VerticalAlignment>Top</VerticalAlignment><TextFitMode>ShrinkToFit</TextFitMode><UseFullFontHeight>True</UseFullFontHeight><Verticalized>False</Verticalized><StyledText><Element><String>€</String><Attributes><Font Family=\"Arial\" Size=\"8\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element><Element><String> "+content.amount+"</String><Attributes><Font Family=\"Arial\" Size=\"11\" Bold=\"True\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element></StyledText></TextObject><Bounds X=\"3255.87255859375\" Y=\"80.4545364379883\" Width=\"1472.72729492188\" Height=\"1767.27270507813\" /></ObjectInfo></DieCutLabel>";
									var template = "﻿<"+"?xml version=\"1.0\" encoding=\"utf-8\"?>\r\n<DieCutLabel Version=\"8.0\" Units=\"twips\"><PaperOrientation>Landscape</PaperOrientation><Id>WhiteNameBadge11356</Id><PaperName>11356 White Name Badge - virtual</PaperName><DrawCommands><RoundRectangle X=\"0\" Y=\"0\" Width=\"2340\" Height=\"5040\" Rx=\"270\" Ry=\"270\" /></DrawCommands><ObjectInfo><TextObject><Name>TEKST</Name><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /><BackColor Alpha=\"0\" Red=\"255\" Green=\"255\" Blue=\"255\" /><LinkedObjectName></LinkedObjectName><Rotation>Rotation0</Rotation><IsMirrored>False</IsMirrored><IsVariable>False</IsVariable><HorizontalAlignment>Left</HorizontalAlignment><VerticalAlignment>Top</VerticalAlignment><TextFitMode>ShrinkToFit</TextFitMode><UseFullFontHeight>True</UseFullFontHeight><Verticalized>False</Verticalized><StyledText><Element><String>"+content.name+" ("+content.default_price+" €)\n\n</String><Attributes><Font Family=\"Arial\" Size=\"10\" Bold=\"True\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element><Element><String></String><Attributes><Font Family=\"Arial\" Size=\"10\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element><Element><String>"+( (content.company != '')?content.company:'')+"\n</String><Attributes><Font Family=\"Arial\" Size=\"8\" Bold=\"True\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element><Element><String>"+content.c_name+"\n\n</String><Attributes><Font Family=\"Arial\" Size=\"8\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element><Element><String></String><Attributes><Font Family=\"Arial\" Size=\"10\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element><Element><String>"+content.extra_field_text+"\n</String><Attributes><Font Family=\"Arial\" Size=\"7\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element><Element><String>"+content.extra+"</String><Attributes><Font Family=\"Arial\" Size=\"7\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element><Element><String></String><Attributes><Font Family=\"Arial\" Size=\"8\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element><Element><String>"+content.remark+"</String><Attributes><Font Family=\"Arial\" Size=\"7\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element></StyledText></TextObject><Bounds X=\"391\" Y=\"100\" Width=\"3828.33227539063\" Height=\"5040\" /></ObjectInfo><ObjectInfo><TextObject><Name>TEKST_1</Name><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /><BackColor Alpha=\"0\" Red=\"255\" Green=\"255\" Blue=\"255\" /><LinkedObjectName></LinkedObjectName><Rotation>Rotation0</Rotation><IsMirrored>False</IsMirrored><IsVariable>False</IsVariable><HorizontalAlignment>Right</HorizontalAlignment><VerticalAlignment>Top</VerticalAlignment><TextFitMode>ShrinkToFit</TextFitMode><UseFullFontHeight>True</UseFullFontHeight><Verticalized>False</Verticalized><StyledText><Element><String>€</String><Attributes><Font Family=\"Arial\" Size=\"8\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element><Element><String> "+content.amount+"</String><Attributes><Font Family=\"Arial\" Size=\"11\" Bold=\"True\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" /><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /></Attributes></Element></StyledText></TextObject><Bounds X=\"3255.87255859375\" Y=\"80.4545364379883\" Width=\"1472.72729492188\" Height=\"1767.27270507813\" /></ObjectInfo></DieCutLabel>";
									//alert(template);
									create_label(template);

								}
							}else{
								var content = response.data;

								// At webby
								//var template = "<"+"?xml version=\"1.0\" encoding=\"utf-8\"?>\r\n<DieCutLabel Version=\"8.0\" Units=\"twips\">\r\n\t<PaperOrientation>Landscape<\/PaperOrientation>\r\n\t<Id>WhiteNameBadge11356<\/Id>\r\n\t<PaperName>11356 White Name Badge - virtual<\/PaperName>\r\n\t<DrawCommands>\r\n\t\t<RoundRectangle X=\"0\" Y=\"0\" Width=\"2340\" Height=\"5040\" Rx=\"270\" Ry=\"270\" \/>\r\n\t<\/DrawCommands>\r\n\t<ObjectInfo>\r\n\t\t<TextObject>\r\n\t\t\t<Name>TEKST<\/Name>\r\n\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t<BackColor Alpha=\"0\" Red=\"255\" Green=\"255\" Blue=\"255\" \/>\r\n\t\t\t<LinkedObjectName><\/LinkedObjectName>\r\n\t\t\t<Rotation>Rotation0<\/Rotation>\r\n\t\t\t<IsMirrored>False<\/IsMirrored>\r\n\t\t\t<IsVariable>False<\/IsVariable>\r\n\t\t\t<HorizontalAlignment>Left<\/HorizontalAlignment>\r\n\t\t\t<VerticalAlignment>Top<\/VerticalAlignment>\r\n\t\t\t<TextFitMode>None<\/TextFitMode>\r\n\t\t\t<UseFullFontHeight>True<\/UseFullFontHeight>\r\n\t\t\t<Verticalized>False<\/Verticalized>\r\n\t\t\t<StyledText>\r\n\t\t\t\t<Element>\r\n\t\t\t\t\t<String>ID "+content.order_id+"\r\n<\/String>\r\n\t\t\t\t\t<Attributes>\r\n\t\t\t\t\t\t<Font Family=\"Arial\" Size=\"10\" Bold=\"True\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" \/>\r\n\t\t\t\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t\t\t<\/Attributes>\r\n\t\t\t\t<\/Element>\r\n\t\t\t\t<Element>\r\n\t\t\t\t\t<String>\r\n<\/String>\r\n\t\t\t\t\t<Attributes>\r\n\t\t\t\t\t\t<Font Family=\"Arial\" Size=\"10\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" \/>\r\n\t\t\t\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t\t\t<\/Attributes>\r\n\t\t\t\t<\/Element>\r\n\t\t\t\t<Element>\r\n\t\t\t\t\t<String>"+content.name+"\r\n<\/String>\r\n\t\t\t\t\t<Attributes>\r\n\t\t\t\t\t\t<Font Family=\"Arial\" Size=\"8\" Bold=\"True\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" \/>\r\n\t\t\t\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t\t\t<\/Attributes>\r\n\t\t\t\t<\/Element>\r\n\t\t\t\t<Element>\r\n\t\t\t\t\t<String>"+content.address+"\r\n<\/String>\r\n\t\t\t\t\t<Attributes>\r\n\t\t\t\t\t\t<Font Family=\"Arial\" Size=\"7\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" \/>\r\n\t\t\t\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t\t\t<\/Attributes>\r\n\t\t\t\t<\/Element>\r\n\t\t\t<\/StyledText>\r\n\t\t<\/TextObject>\r\n\t\t<Bounds X=\"391\" Y=\"278\" Width=\"2910.150390625\" Height=\"1600\" \/>\r\n\t<\/ObjectInfo>\r\n\t<ObjectInfo>\r\n\t\t<TextObject>\r\n\t\t\t<Name>TEKST_1<\/Name>\r\n\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t<BackColor Alpha=\"0\" Red=\"255\" Green=\"255\" Blue=\"255\" \/>\r\n\t\t\t<LinkedObjectName><\/LinkedObjectName>\r\n\t\t\t<Rotation>Rotation0<\/Rotation>\r\n\t\t\t<IsMirrored>False<\/IsMirrored>\r\n\t\t\t<IsVariable>False<\/IsVariable>\r\n\t\t\t<HorizontalAlignment>Right<\/HorizontalAlignment>\r\n\t\t\t<VerticalAlignment>Top<\/VerticalAlignment>\r\n\t\t\t<TextFitMode>ShrinkToFit<\/TextFitMode>\r\n\t\t\t<UseFullFontHeight>True<\/UseFullFontHeight>\r\n\t\t\t<Verticalized>False<\/Verticalized>\r\n\t\t\t<StyledText>\r\n\t\t\t\t<Element>\r\n\t\t\t\t\t<String>€ "+content.amount+"\r\n<\/String>\r\n\t\t\t\t\t<Attributes>\r\n\t\t\t\t\t\t<Font Family=\"Arial\" Size=\"10\" Bold=\"True\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" \/>\r\n\t\t\t\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t\t\t<\/Attributes>\r\n\t\t\t\t<\/Element>\r\n\t\t\t\t<Element>\r\n\t\t\t\t\t<String>\r\n\r\n\r\n\r\n<\/String>\r\n\t\t\t\t\t<Attributes>\r\n\t\t\t\t\t\t<Font Family=\"Arial\" Size=\"12\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" \/>\r\n\t\t\t\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t\t\t<\/Attributes>\r\n\t\t\t\t<\/Element>\r\n\t\t\t\t<Element>\r\n\t\t\t\t\t<String>"+content.date+"<\/String>\r\n\t\t\t\t\t<Attributes>\r\n\t\t\t\t\t\t<Font Family=\"Arial\" Size=\"10\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" \/>\r\n\t\t\t\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t\t\t<\/Attributes>\r\n\t\t\t\t<\/Element>\r\n\t\t\t<\/StyledText>\r\n\t\t<\/TextObject>\r\n\t\t<Bounds X=\"3234.05444335938\" Y=\"287.727264404297\" Width=\"1494.54541015625\" Height=\"1560\" \/>\r\n\t<\/ObjectInfo>\r\n\t<ObjectInfo>\r\n\t\t<TextObject>\r\n\t\t\t<Name>TEKST_3<\/Name>\r\n\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t<BackColor Alpha=\"0\" Red=\"255\" Green=\"255\" Blue=\"255\" \/>\r\n\t\t\t<LinkedObjectName><\/LinkedObjectName>\r\n\t\t\t<Rotation>Rotation0<\/Rotation>\r\n\t\t\t<IsMirrored>False<\/IsMirrored>\r\n\t\t\t<IsVariable>False<\/IsVariable>\r\n\t\t\t<HorizontalAlignment>Left<\/HorizontalAlignment>\r\n\t\t\t<VerticalAlignment>Bottom<\/VerticalAlignment>\r\n\t\t\t<TextFitMode>None<\/TextFitMode>\r\n\t\t\t<UseFullFontHeight>True<\/UseFullFontHeight>\r\n\t\t\t<Verticalized>False<\/Verticalized>\r\n\t\t\t<StyledText>\r\n\t\t\t\t<Element>\r\n\t\t\t\t\t<String>"+content.remark+"\r\n<\/String>\r\n\t\t\t\t\t<Attributes>\r\n\t\t\t\t\t\t<Font Family=\"Arial\" Size=\"7\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" \/>\r\n\t\t\t\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t\t\t<\/Attributes>\r\n\t\t\t\t<\/Element>\r\n\t\t\t<\/StyledText>\r\n\t\t<\/TextObject>\r\n\t\t<Bounds X=\"391\" Y=\"278\" Width=\"2910.150390625\" Height=\"1600\" \/>\r\n\t<\/ObjectInfo>\r\n<\/DieCutLabel>";

								// At Live
								//var template = "<"+"?xml version=\"1.0\" encoding=\"utf-8\"?>\r\n<DieCutLabel Version=\"8.0\" Units=\"twips\">\r\n\t<PaperOrientation>Landscape<\/PaperOrientation>\r\n\t<Id>WhiteNameBadge11356<\/Id>\r\n\t<PaperName>11356 White Name Badge - virtual<\/PaperName>\r\n\t<DrawCommands>\r\n\t\t<RoundRectangle X=\"0\" Y=\"0\" Width=\"2340\" Height=\"5040\" Rx=\"270\" Ry=\"270\" \/>\r\n\t<\/DrawCommands>\r\n\t<ObjectInfo>\r\n\t\t<TextObject>\r\n\t\t\t<Name>TEKST<\/Name>\r\n\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t<BackColor Alpha=\"0\" Red=\"255\" Green=\"255\" Blue=\"255\" \/>\r\n\t\t\t<LinkedObjectName><\/LinkedObjectName>\r\n\t\t\t<Rotation>Rotation0<\/Rotation>\r\n\t\t\t<IsMirrored>False<\/IsMirrored>\r\n\t\t\t<IsVariable>False<\/IsVariable>\r\n\t\t\t<HorizontalAlignment>Left<\/HorizontalAlignment>\r\n\t\t\t<VerticalAlignment>Top<\/VerticalAlignment>\r\n\t\t\t<TextFitMode>None<\/TextFitMode>\r\n\t\t\t<UseFullFontHeight>True<\/UseFullFontHeight>\r\n\t\t\t<Verticalized>False<\/Verticalized>\r\n\t\t\t<StyledText>\r\n\t\t\t\t<Element>\r\n\t\t\t\t\t<String>ID "+content.order_id+"\r\n<\/String>\r\n\t\t\t\t\t<Attributes>\r\n\t\t\t\t\t\t<Font Family=\"Arial\" Size=\"10\" Bold=\"True\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" \/>\r\n\t\t\t\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t\t\t<\/Attributes>\r\n\t\t\t\t<\/Element>\r\n\t\t\t\t<Element>\r\n\t\t\t\t\t<String>\r\n<\/String>\r\n\t\t\t\t\t<Attributes>\r\n\t\t\t\t\t\t<Font Family=\"Arial\" Size=\"10\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" \/>\r\n\t\t\t\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t\t\t<\/Attributes>\r\n\t\t\t\t<\/Element>\r\n\t\t\t\t<Element>\r\n\t\t\t\t\t<String>"+content.name+"\r\n<\/String>\r\n\t\t\t\t\t<Attributes>\r\n\t\t\t\t\t\t<Font Family=\"Arial\" Size=\"8\" Bold=\"True\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" \/>\r\n\t\t\t\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t\t\t<\/Attributes>\r\n\t\t\t\t<\/Element>\r\n\t\t\t\t<Element>\r\n\t\t\t\t\t<String>"+content.address+"\r\n<\/String>\r\n\t\t\t\t\t<Attributes>\r\n\t\t\t\t\t\t<Font Family=\"Arial\" Size=\"7\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" \/>\r\n\t\t\t\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t\t\t<\/Attributes>\r\n\t\t\t\t<\/Element>\r\n\t\t\t<\/StyledText>\r\n\t\t<\/TextObject>\r\n\t\t<Bounds X=\"391\" Y=\"278\" Width=\"2910.150390625\" Height=\"1600\" \/>\r\n\t<\/ObjectInfo>\r\n\t<ObjectInfo>\r\n\t\t<TextObject>\r\n\t\t\t<Name>TEKST_1<\/Name>\r\n\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t<BackColor Alpha=\"0\" Red=\"255\" Green=\"255\" Blue=\"255\" \/>\r\n\t\t\t<LinkedObjectName><\/LinkedObjectName>\r\n\t\t\t<Rotation>Rotation0<\/Rotation>\r\n\t\t\t<IsMirrored>False<\/IsMirrored>\r\n\t\t\t<IsVariable>False<\/IsVariable>\r\n\t\t\t<HorizontalAlignment>Right<\/HorizontalAlignment>\r\n\t\t\t<VerticalAlignment>Top<\/VerticalAlignment>\r\n\t\t\t<TextFitMode>ShrinkToFit<\/TextFitMode>\r\n\t\t\t<UseFullFontHeight>True<\/UseFullFontHeight>\r\n\t\t\t<Verticalized>False<\/Verticalized>\r\n\t\t\t<StyledText>\r\n\t\t\t\t<Element>\r\n\t\t\t\t\t<String>€ "+content.amount+"\r\n<\/String>\r\n\t\t\t\t\t<Attributes>\r\n\t\t\t\t\t\t<Font Family=\"Arial\" Size=\"10\" Bold=\"True\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" \/>\r\n\t\t\t\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t\t\t<\/Attributes>\r\n\t\t\t\t<\/Element>\r\n\t\t\t\t<Element>\r\n\t\t\t\t\t<String>\r\n\r\n\r\n\r\n<\/String>\r\n\t\t\t\t\t<Attributes>\r\n\t\t\t\t\t\t<Font Family=\"Arial\" Size=\"12\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" \/>\r\n\t\t\t\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t\t\t<\/Attributes>\r\n\t\t\t\t<\/Element>\r\n\t\t\t\t<Element>\r\n\t\t\t\t\t<String>"+content.date+"<\/String>\r\n\t\t\t\t\t<Attributes>\r\n\t\t\t\t\t\t<Font Family=\"Arial\" Size=\"10\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" \/>\r\n\t\t\t\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t\t\t<\/Attributes>\r\n\t\t\t\t<\/Element>\r\n\t\t\t<\/StyledText>\r\n\t\t<\/TextObject>\r\n\t\t<Bounds X=\"3234.05444335938\" Y=\"287.727264404297\" Width=\"1494.54541015625\" Height=\"1560\" \/>\r\n\t<\/ObjectInfo>\r\n\t<ObjectInfo>\r\n\t\t<TextObject>\r\n\t\t\t<Name>TEKST_3<\/Name>\r\n\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t<BackColor Alpha=\"0\" Red=\"255\" Green=\"255\" Blue=\"255\" \/>\r\n\t\t\t<LinkedObjectName><\/LinkedObjectName>\r\n\t\t\t<Rotation>Rotation0<\/Rotation>\r\n\t\t\t<IsMirrored>False<\/IsMirrored>\r\n\t\t\t<IsVariable>False<\/IsVariable>\r\n\t\t\t<HorizontalAlignment>Left<\/HorizontalAlignment>\r\n\t\t\t<VerticalAlignment>Bottom<\/VerticalAlignment>\r\n\t\t\t<TextFitMode>None<\/TextFitMode>\r\n\t\t\t<UseFullFontHeight>True<\/UseFullFontHeight>\r\n\t\t\t<Verticalized>False<\/Verticalized>\r\n\t\t\t<StyledText>\r\n\t\t\t\t<Element>\r\n\t\t\t\t\t<String>"+content.remark+"\r\n<\/String>\r\n\t\t\t\t\t<Attributes>\r\n\t\t\t\t\t\t<Font Family=\"Arial\" Size=\"7\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" \/>\r\n\t\t\t\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t\t\t<\/Attributes>\r\n\t\t\t\t<\/Element>\r\n\t\t\t<\/StyledText>\r\n\t\t<\/TextObject>\r\n\t\t<Bounds X=\"391\" Y=\"278\" Width=\"2910.150390625\" Height=\"1600\" \/>\r\n\t<\/ObjectInfo>\r\n<\/DieCutLabel>";
								var template = "<"+"?xml version=\"1.0\" encoding=\"utf-8\"?>\r\n<DieCutLabel Version=\"8.0\" Units=\"twips\">\r\n\t<PaperOrientation>Landscape<\/PaperOrientation>\r\n\t<Id>WhiteNameBadge11356<\/Id>\r\n\t<PaperName>11356 White Name Badge - virtual<\/PaperName>\r\n\t<DrawCommands>\r\n\t\t<RoundRectangle X=\"0\" Y=\"0\" Width=\"2340\" Height=\"5040\" Rx=\"270\" Ry=\"270\" \/>\r\n\t<\/DrawCommands>\r\n\t<ObjectInfo>\r\n\t\t<TextObject>\r\n\t\t\t<Name>TEKST<\/Name>\r\n\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t<BackColor Alpha=\"0\" Red=\"255\" Green=\"255\" Blue=\"255\" \/>\r\n\t\t\t<LinkedObjectName><\/LinkedObjectName>\r\n\t\t\t<Rotation>Rotation0<\/Rotation>\r\n\t\t\t<IsMirrored>False<\/IsMirrored>\r\n\t\t\t<IsVariable>False<\/IsVariable>\r\n\t\t\t<HorizontalAlignment>Left<\/HorizontalAlignment>\r\n\t\t\t<VerticalAlignment>Top<\/VerticalAlignment>\r\n\t\t\t<TextFitMode>None<\/TextFitMode>\r\n\t\t\t<UseFullFontHeight>True<\/UseFullFontHeight>\r\n\t\t\t<Verticalized>False<\/Verticalized>\r\n\t\t\t<StyledText>\r\n\t\t\t\t<Element>\r\n\t\t\t\t\t<String>ID "+content.order_id+"\r\n<\/String>\r\n\t\t\t\t\t<Attributes>\r\n\t\t\t\t\t\t<Font Family=\"Arial\" Size=\"10\" Bold=\"True\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" \/>\r\n\t\t\t\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t\t\t<\/Attributes>\r\n\t\t\t\t<\/Element>\r\n\t\t\t\t<Element>\r\n\t\t\t\t\t<String> "+( (content.company_c != '')?content.company_c:'')+"\r\n<\/String>\r\n\t\t\t\t\t<Attributes>\r\n\t\t\t\t\t\t<Font Family=\"Arial\" Size=\"10\" Bold=\"True\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" \/>\r\n\t\t\t\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t\t\t<\/Attributes>\r\n\t\t\t\t</Element><Element>\r\n\t\t\t\t\t<String>\r\n<\/String>\r\n\t\t\t\t\t<Attributes>\r\n\t\t\t\t\t\t<Font Family=\"Arial\" Size=\"10\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" \/>\r\n\t\t\t\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t\t\t<\/Attributes>\r\n\t\t\t\t<\/Element>\r\n\t\t\t\t<Element>\r\n\t\t\t\t\t<String>"+content.name+"\r\n<\/String>\r\n\t\t\t\t\t<Attributes>\r\n\t\t\t\t\t\t<Font Family=\"Arial\" Size=\"8\" Bold=\"True\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" \/>\r\n\t\t\t\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t\t\t<\/Attributes>\r\n\t\t\t\t<\/Element>\r\n\t\t\t\t<Element>\r\n\t\t\t\t\t<String>"+content.address+"\r\n<\/String>\r\n\t\t\t\t\t<Attributes>\r\n\t\t\t\t\t\t<Font Family=\"Arial\" Size=\"7\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" \/>\r\n\t\t\t\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t\t\t<\/Attributes>\r\n\t\t\t\t<\/Element>\r\n\t\t\t<\/StyledText>\r\n\t\t<\/TextObject>\r\n\t\t<Bounds X=\"391\" Y=\"100\" Width=\"2910.150390625\" Height=\"1600\" \/>\r\n\t<\/ObjectInfo>\r\n\t<ObjectInfo>\r\n\t\t<TextObject>\r\n\t\t\t<Name>TEKST_1<\/Name>\r\n\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t<BackColor Alpha=\"0\" Red=\"255\" Green=\"255\" Blue=\"255\" \/>\r\n\t\t\t<LinkedObjectName><\/LinkedObjectName>\r\n\t\t\t<Rotation>Rotation0<\/Rotation>\r\n\t\t\t<IsMirrored>False<\/IsMirrored>\r\n\t\t\t<IsVariable>False<\/IsVariable>\r\n\t\t\t<HorizontalAlignment>Right<\/HorizontalAlignment>\r\n\t\t\t<VerticalAlignment>Top<\/VerticalAlignment>\r\n\t\t\t<TextFitMode>ShrinkToFit<\/TextFitMode>\r\n\t\t\t<UseFullFontHeight>True<\/UseFullFontHeight>\r\n\t\t\t<Verticalized>False<\/Verticalized>\r\n\t\t\t<StyledText>\r\n\t\t\t\t<Element>\r\n\t\t\t\t\t<String>€ "+content.amount+"\r\n<\/String>\r\n\t\t\t\t\t<Attributes>\r\n\t\t\t\t\t\t<Font Family=\"Arial\" Size=\"10\" Bold=\"True\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" \/>\r\n\t\t\t\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t\t\t<\/Attributes>\r\n\t\t\t\t<\/Element>\r\n\t\t\t\t<Element>\r\n\t\t\t\t\t<String>\r\n\r\n\r\n\r\n<\/String>\r\n\t\t\t\t\t<Attributes>\r\n\t\t\t\t\t\t<Font Family=\"Arial\" Size=\"12\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" \/>\r\n\t\t\t\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t\t\t<\/Attributes>\r\n\t\t\t\t<\/Element>\r\n\t\t\t\t<Element>\r\n\t\t\t\t\t<String>"+content.date+"<\/String>\r\n\t\t\t\t\t<Attributes>\r\n\t\t\t\t\t\t<Font Family=\"Arial\" Size=\"10\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" \/>\r\n\t\t\t\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t\t\t<\/Attributes>\r\n\t\t\t\t<\/Element>\r\n\t\t\t<\/StyledText>\r\n\t\t<\/TextObject>\r\n\t\t<Bounds X=\"3234.05444335938\" Y=\"287.727264404297\" Width=\"1494.54541015625\" Height=\"1560\" \/>\r\n\t<\/ObjectInfo>\r\n\t<ObjectInfo>\r\n\t\t<TextObject>\r\n\t\t\t<Name>TEKST_3<\/Name>\r\n\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t<BackColor Alpha=\"0\" Red=\"255\" Green=\"255\" Blue=\"255\" \/>\r\n\t\t\t<LinkedObjectName><\/LinkedObjectName>\r\n\t\t\t<Rotation>Rotation0<\/Rotation>\r\n\t\t\t<IsMirrored>False<\/IsMirrored>\r\n\t\t\t<IsVariable>False<\/IsVariable>\r\n\t\t\t<HorizontalAlignment>Left<\/HorizontalAlignment>\r\n\t\t\t<VerticalAlignment>Bottom<\/VerticalAlignment>\r\n\t\t\t<TextFitMode>None<\/TextFitMode>\r\n\t\t\t<UseFullFontHeight>True<\/UseFullFontHeight>\r\n\t\t\t<Verticalized>False<\/Verticalized>\r\n\t\t\t<StyledText>\r\n\t\t\t\t<Element>\r\n\t\t\t\t\t<String>"+content.remark+"\r\n<\/String>\r\n\t\t\t\t\t<Attributes>\r\n\t\t\t\t\t\t<Font Family=\"Arial\" Size=\"7\" Bold=\"False\" Italic=\"False\" Underline=\"False\" Strikeout=\"False\" \/>\r\n\t\t\t\t\t\t<ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" \/>\r\n\t\t\t\t\t<\/Attributes>\r\n\t\t\t\t<\/Element>\r\n\t\t\t<\/StyledText>\r\n\t\t<\/TextObject>\r\n\t\t<Bounds X=\"391\" Y=\"278\" Width=\"2910.150390625\" Height=\"1600\" \/>\r\n\t<\/ObjectInfo>\r\n<\/DieCutLabel>";

								//var template = "<"+"?xml version=\"1.0\" encoding=\"utf-8\"?><DieCutLabel Version=\"8.0\" Units=\"twips\"><PaperOrientation>Landscape</PaperOrientation><Id>Address</Id><PaperName>30252 Address</PaperName><DrawCommands><RoundRectangle X=\"0\" Y=\"0\" Width=\"1581\" Height=\"5040\" Rx=\"270\" Ry=\"270\" /></DrawCommands><ObjectInfo><ImageObject><Name>Image</Name><ForeColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /><BackColor Alpha=\"0\" Red=\"255\" Green=\"255\" Blue=\"255\" /><LinkedObjectName></LinkedObjectName><Rotation>Rotation0</Rotation><IsMirrored>False</IsMirrored><IsVariable>False</IsVariable><ImageLocation>http://webilyst.com/projects/bolive/assets/cp/images/move.png<ImageLocation/><ScaleMode>Fill</ScaleMode><BorderWidth>0</BorderWidth><BorderColor Alpha=\"255\" Red=\"0\" Green=\"0\" Blue=\"0\" /><HorizontalAlignment>Left</HorizontalAlignment><VerticalAlignment>Top</VerticalAlignment></ImageObject><Bounds X=\"331\" Y=\"57.9999999999999\" Width=\"1440\" Height=\"1440\" /></ObjectInfo></DieCutLabel>";
								//alert(template);
								create_label(template);
							}
						}
					}
			});
		}
<!-- ----------------------------------------------------------- -->

<!-- -----/*function will show div that contains the purchases*/------ -->
	function show_purchases(orders_id){
		$.post(base_url+'cp/orders/lijst',{'act':'show_order_details','orders_id':orders_id},function(data){
			$('#show_order_details').html(data);
			tb_show('Details','TB_inline?height=300&width=650&inlineId=show_order_details',null);
		});
	}
<!-- ----------------------------------------------------------- -->

<!-- -----function that will reload the page----- -->
	function all_orders(){
  		window.location =base_url+"cp/orders";
  	}
<!-- ------------------------------------------- -->

<!-- -----------------function to show pop up for a single order to print---------------- -->
	function print_Popup(id){

		window.open(base_url+"cp/orders/print_order_details?id="+id+"&print_count=single", "myWindow", "status = 1, height = 600, width = 550, resizable = 1, scrollbars=yes, left=10, top=100" );
	}
<!---------------------------------------------------------------------------------------->

<!-- -----------------function that will check all the checkbox---------------------- -->
	function select_all(id1, id2, start_index,end_index){
		if(document.getElementById(id1).checked == true){
			for(i=parseInt(start_index); i<parseInt(end_index); i++){
				id = id2+i;
				document.getElementById(id).checked = true;
			}
		}else{
			for(i=parseInt(start_index); i<end_index; i++){
				id = id2+i;
				document.getElementById(id).checked = false;
			}
		}
 	}
<!-- --------------------------------------------------------------------------------- -->

<!-- -------------------function invoked when delete all is clicked--------------------- -->
	function ValidateSelection(frm, id1,start_index,end_index){
		var x=true;
		for(var i=parseInt(start_index);i<parseInt(end_index);i++){
			var id = id1 + i;
			//alert(id+'   '+document.getElementById(id).value);
			if(document.getElementById(id).checked){
				x=false;
				confirmDel(frm);
				break;
			}
		}
		if(x){
			alert(messages1);
		}
		return false;
	}

	function confirmDel(frm){
		if(confirm(messages2)){
			var delete_all=new Array();
			var arr=document.getElementsByName("del[]");

			var j=0;
			for(i=0;i<arr.length;i++){
				var obj=document.getElementsByName('del[]').item(i);
				if(obj.checked){
					delete_all[j]=obj.value;
					j++;
				}
			}
			order_ids=delete_all.toString();
			$.post(base_url+'cp/orders',{'act':'delete_order','delete_row':'all','order_ids':order_ids},            function(data){
				if(data=='success'){
					alert(messages3);
					window.location=base_url+'cp/orders';
				}else if(data=='error'){
					alert(messages4);
				}
			});




		}
	}
<!-- ---------------------------------------------------------------------- -->

<!-- -------------function invoked when print all is clicked--------------- -->
	function ValidateSelection1(frm, id1, start_index,end_index){
		var x=true;
		for(var i=parseInt(start_index);i<parseInt(end_index);i++){
			var id = id1 + i;
			//alert(document.getElementById(id).value);
			if(document.getElementById(id).checked){
				x=false;
				confirmPrintAll(frm);
				break;
			}
		}
		if(x){
			alert(messages6);
		}
			return false;
	}

	function confirmPrintAll(frm){
		if(confirm(messages7)){
			var print_all = new Array();
			var arr = document.getElementsByName("del[]");
			var j =0;
			for(var i = 0; i < arr.length; i++){
            	var obj = document.getElementsByName("del[]").item(i);
				if(obj.checked){
					print_all[j] = obj.value;
					j++;
				}
			}
			var order_ids=print_all.toString();
			/*$.post('<?php echo base_url?>cp/cdashboard/orders',{'act':'print_order','print_count':'all','order_ids':order_ids},function(data){
				var my_window=window.open( "", "myWindow", "status = 1, height = 600, width = 550, resizable = 1, scrollbars=yes, left=10, top=100" );
				$(my_window.document).find("body").html(data);

			}); */

			<!--this will open a new window -->
			window.open( base_url+"cp/orders/print_order_details?order_ids="+order_ids+"&print_count=all", "myWindow", "status = 1, height = 600, width = 550, resizable = 1, scrollbars=yes, left=10, top=100" );

		}
	}
<!-- ------------------------------------------------------------------------------- -->
/*-------------function to show thick box when  client's name is clicked -----------*/
	function show_client_data(order_id){
		tb_show('Details','#TB_inline?height=290&width=400&inlineId=show_client_'+order_id,'');
	}
/*----------------------------------------------------------------------------------*/






var members = new Array();


function urldecode(str)
{
     if(str)
	 return unescape(str.replace(/\+/g, " "));
	 else
	 return '';
}

/* -------------------- FUNCTION TO STRIP SLASHES ------------------------------------------ */
function stripslashes(str) {
	//        example 1: stripslashes('Kevin\'s code');
	//        returns 1: "Kevin's code"
	//        example 2: stripslashes('Kevin\\\'s code');
	//        returns 2: "Kevin\'s code"

	return (str + '')
	    .replace(/\\(.?)/g, function(s, n1) {
	      switch (n1) {
	        case '\\':
	          return '\\';
	        case '0':
	          return '\u0000';
	        case '':
	          return '';
	        default:
	          return n1;
	     }
	});
}

function pageselectCallback(page_index, jq){
	// Get number of elements per pagionation page from form

	labeler_activated=true;
	var items_per_page = 10;
	//var max_elem = Math.min((page_index+1) * items_per_page, dataLength);
	var max_elem = Math.min(items_per_page, (dataLength -(items_per_page*(page_index))));
	var newcontent = '';

	var start_index = page_index*items_per_page;
	var end_index = max_elem;

	$.ajax({
		url: base_url+'cp/orders/ajax_orders',
		type:'POST',
		dataType: 'json',
		data:{
				start:start_index,
				limit: end_index,
				start_date: $("#filtered_start_date").val(),
				end_date: $("#filtered_end_date").val()
			},
		success: function(members){

			newcontent += '<thead>';
			newcontent += '<tr>';
			newcontent += '<th width=\"1%\"><input type=\"checkbox\" values=\"all\" onClick=\"select_all(\'check_all\',\'chk\','+start_index+','+(start_index+end_index)+');\" name =\"check_all\" id=\"check_all\"/></th>';
			newcontent += '<th width=\"3%\">'+messages9+'</th>';
			newcontent += '<th width="120px">'+messages10+'</th>';
			newcontent += '<th>'+messages11+'</th>';
			newcontent += '<th>'+messages12+'</th>';
			newcontent += '<th width="80px">'+messages13+'</th>';
			newcontent += '<th width="100px" style="text-align:left">'+messages14+'</th>';
			newcontent += '<th>'+messages15+'</th>';
			if(company_role == "super"){
				newcontent += '<th>'+messages16+'</th>';
			}
			newcontent += '<th>&nbsp;</th>';
			newcontent += '<th>'+messages17+'</th>';

			if(labeler_activated)
				newcontent += '<th>&nbsp;</th>';
			newcontent += '</tr>';
			newcontent += '</thead>';

			for(var i=0;i<max_elem;i++)
			{
				newcontent += '<tr class=\"'+members[i][8]+'\">';
				newcontent += '<td width=\"2%\" style=\"padding:0 10px;\"><input type="checkbox" value=\"'+members[i][0]+'\" name=\"del[]\" id=\"chk'+(i+start_index)+'\" /></td>';
				newcontent += '<td nowrap=\"nowrap\" '+( (members[i][15] == "1")?'class=\"strik-out\"':'' )+' >'+members[i][1]+'</td>';
				newcontent += '<td nowrap=\"nowrap\" '+( (members[i][15] == "1")?'class=\"strik-out\"':'' )+' width=\"70px\"><a onclick= \"show_client_data('+members[i][0]+')\" href=\"#\">'+stripslashes( urldecode( decodeURIComponent( members[i][2] ) ) )+'</a>&nbsp;'+((members[i][11]=='1')?'<img src=\"'+base_url+'assets/cp/images/red_dot.gif\"  width=\"5px\" title=\"'+messages18+'\">':'')+''+stripslashes( members[i][14] )+'</td>';
				newcontent += '<td nowrap=\"nowrap\" '+( (members[i][15] == "1")?'class=\"strik-out\"':'' )+' ><a href=\"javascript:void(0);\" onclick=\"show_purchases('+members[i][0]+')\">'+members[i][3]+'&nbsp;&euro;</a>'+urldecode(members[i][9])+'</td>';
				newcontent += '<td nowrap=\"nowrap\" width=\"90px\">'+urldecode(members[i][4])+'</td>';
				newcontent += '<td nowrap=\"nowrap\" width=\"120px\">'+stripslashes( urldecode(members[i][5]) )+'</td>';
				newcontent += '<td width=\"60px\" nowrap=\"nowrap\">'+urldecode(members[i][6])+'</td>';
				newcontent += '<td nowrap=\"nowrap\">'+urldecode(members[i][7])+'</td>';
				if(company_role == "super"){
					newcontent += '<td nowrap=\"nowrap\">'+members[i][12]+'</td>';
				}
				newcontent += '<td nowrap=\"nowrap\">&nbsp;';
				if(members[i][10] == 'subscribe')
				  newcontent += '<img width=\"16\" height=\"16\" border=\"0\" alt=\"Factuur\" src=\"'+base_url+'assets/cp/images/checked_invoice_64.gif\">';
				newcontent += '</td>';

				newcontent += '<td nowrap=\"nowrap\">';
				newcontent += '<a class="edit" href=\"javascript:;\" onClick="print_Popup('+members[i][0]+');"><img class=\"v_align_middle\" src=\"'+base_url+'assets/cp/images/print_16.gif\" width=\"16\" height=\"16\" alt="\Print\" border=\"0"\></a>';
				newcontent += '&nbsp;|&nbsp';
				newcontent += '<a class=\"edit\" href=\"'+base_url+'cp/orders/order_details_edit/update/'+members[i][0]+'"><img class=\"v_align_middle\" src=\"'+base_url+'assets/cp/images/edit.gif\" width=\"16\" height=\"16\" alt=\"Edit\" border=\"0\"></a>';
				if(members[i][13]){
					newcontent += '&nbsp;|&nbsp';
					newcontent += '<a class=\"\" href=\"'+base_url+'cp/orders/order_details_edit/update/'+members[i][0]+'"\"><img class=\"v_align_middle\" src=\"'+base_url+'assets/cp/images/image-x-photo-cd.png\" width=\"16\" height=\"16\" alt=\"remove\" border=\"0\"></a>';
				}
				newcontent += '&nbsp;|&nbsp';
				newcontent += '<a class=\"delete\" href=\"javascript:;\" onClick=\"return confirmation('+members[i][0]+');\"><img class=\"v_align_middle\" src=\"'+base_url+'assets/cp/images/delete.gif\" width=\"16\" height=\"16\" alt=\"remove\" border=\"0\"></a>';
				newcontent += '</td>';

				if(labeler_activated){
					newcontent += '<td nowrap=\"nowrap\">&nbsp;';
					newcontent += '<a class=\"print\" href=\"javascript: void(0);\" rel=\"'+members[i][0]+'\" onclick=\"print_labeler('+members[i][0]+',\'per_order\')\"><img width=\"16\" height=\"16\" border=\"0\" alt=\"label\" class=\"v_align_middle\" src=\"'+base_url+'assets/cp/images/per_order.png\" title=\"Download Label\"></a>';
					newcontent += '&nbsp;|&nbsp';
					newcontent += '<a class=\"print\" href=\"javascript: void(0);\" rel=\"'+members[i][0]+'\" onclick=\"print_labeler('+members[i][0]+',\'per_product\')\"><img width=\"16\" height=\"16\" border=\"0\" alt=\"label\" class=\"v_align_middle\" src=\"'+base_url+'assets/cp/images/per_product.png\" title=\"Download Label\"></a>';
				    newcontent += '</td>';
				}

				newcontent += '</tr>';
				//j++;

			}

				newcontent += '<tr>';
				newcontent += '<td colspan=\"2\" style=\"color:#FF0000; font-weight:bold\">';
				newcontent += '<input type=\"button\" class=\"button\" value=\"'+messages21+'\" title=\"Delete\", onclick=\"return ValidateSelection(this.form,\'chk\','+start_index+','+(start_index+max_elem)+'\)\" name=\"button\" id=\"button\"/>';
				newcontent += '</td>';
				newcontent += '<td colspan=\"9\" style=\"color:#FF0000; font-weight:bold\">';
				newcontent += '<input type=\"button\" class=\"button\" value=\"'+messages22+'\" title=\"print all\" onclick=\"return ValidateSelection1(this.form,\'chk\', '+start_index+','+(start_index+max_elem)+')\" name=\"button\" id=\"button\"/></td>';
				newcontent += '</tr>';

			// Replace old content with new content
			$('#order_content').html(newcontent);
			}
	});

	// Prevent click event propagation
	return false;
}
function getOptionsFromForm(){
	var opt = {callback: pageselectCallback};

	opt['items_per_page'] = 10;

	opt['num_display_entries'] = 4;

	opt['num_edge_entries'] = 2;

	opt['prev_text'] = 'Prev';

	opt['next_text'] = 'Next';

	return opt;

}

$(document).ready(function(){


	$("#no_accept").on('click',function(){
		window.location = base_url+'cp/login/logout';
	});

	$("#accept").on('click',function(){
		$.post(
				base_url+'cp/cdashboard/accept_mail_from_bestelonline',
				{},
				function(response){
					self.parent.tb_remove();
				}
		);

	});

	var optInit = getOptionsFromForm();
    $("#Pagination").pagination(dataLength, optInit);
});
