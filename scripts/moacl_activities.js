//events begin
		//event 0
		$(document).ready(
					function() {
						//1.загрузка фаз
						var $select = $('form select[name=Phase]');
						$select.append('<option value="MRNG">MORNING</option>');
						$select.append('<option value="DAY">DAY</option>');
						$select.append('<option value="EVNG">EVENING</option>');
						$select.append('<option value="NGHT">NIGHT</option>');
						$select.val('EVNG');
						$select.selectmenu("refresh");
						$select.change(SetLimit);
						SetLimit(); 	
						
						//3.загрузка действий
						$select = $('form select[name=Activity]');
						$select.append('<option value="REPR">Repair</option>');
						$select.append('<option value="CLEN">Clean</option>');
						$select.append('<option value="CALL">Call</option>');
						$select.append('<option value="TIDY">Tidy</option>');
						$select.val('TIDY');
						$select.selectmenu("refresh");
						
								
						
						//4.загрузка объектов
						$select = $('form select[name=Object]');
						$select.append('<option value="LMPS">Lamps</option>');
						$select.append('<option value="ELCT">Electrician</option>');
						$select.append('<option value="CRPT">Carpet</option>');
						
				
						
				}
		);

			
		//event 4	
		
			
			$("#Period").focus(function(){
								$("#Period").css({"font-weight":"normal"});
							}
			);
		//event 5	
			$("#Period").blur(function(){
								$("#Period").css({"font-weight":"bold"});
							}
			);
			
		
			
//events end


	function getLimitOfPhase(Phase){					
		
		//тестовый код
		switch(Phase) {
			case "MRNG": return "3H";
			break; 				
			case "DAY": return "10H";
			break; 				
			case "EVNG": return "3H";
			break; 				
			case "NGHT": return "8H";
			break; 				
		}
		//тестовый код
		
	}
	function SetLimit(){					
		var TypeOfPhase = $("#Phase").val();
		$("#Limit").val(getLimitOfPhase(TypeOfPhase));	
		
	}
	