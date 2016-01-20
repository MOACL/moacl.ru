//events begin
		//event 0
		$(document).ready(
					function() {
						//1.загрузка фаз
						var $select = $("#Place");
						$select.append('<option value="KTCN">KITCHEN</option>');
						$select.append('<option value="GARG">GARAGE</option>');
						$select.append('<option value="LGGI">LOGGIA</option>');
						$select.append('<option value="DACH">DACHA</option>');
						$select.val('GARG');
						$select.selectmenu("refresh");
						$select.change(SetCapacity);
						SetCapacity(); 	
										

						//3.загрузка групп
						$select = $('form select[name=Group]');
						$select.append('<option value="LMPS">Lamps</option>');
						$select.append('<option value="TOOL">Tools</option>');
						$select.append('<option value="CHMC">Chemical</option>');
						$select.append('<option value="CLTH">Clothes</option>');
						$select.selectmenu("refresh");
								
						
						//4.загрузка объектов
						$select = $('form select[name=Object]');
						$select.append('<option value="L220">Lamps_220v</option>');
						$select.append('<option value="DRLL">Drill</option>');
						$select.append('<option value="WSPW">Washing powder</option>');
						$select.selectmenu("refresh");
						
				}
		);
		
		
			
		//event 4	
		
			
			$("#Size").focus(function(){
								$("#Size").css({"font-weight":"normal"});
							}
			);
		//event 5	
			$("#Size").blur(function(){
								$("#Size").css({"font-weight":"bold"});
							}
			);
			
		
			
//events end


	function getCapacityOfPlace(Place){					
		
		//тестовый код
		switch(Place) {
			case "KTCN": return "80%"
			break; 				
			case "GARG": return "50%"
			break; 				
			case "LGGI": return "45%"
			break; 				
			case "DACH": return "90%"
			break; 				
		}
		//тестовый код
		

		
		
	}
	function SetCapacity(){					
		var TypeOfPlace = $("#Place").val();
		$("#Capacity").val(getCapacityOfPlace(TypeOfPlace));	
		
	}
	