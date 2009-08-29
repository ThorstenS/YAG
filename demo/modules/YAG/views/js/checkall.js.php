<script languange="text/javascript">
        
        function check_all(name) {

        	checkboxes = document.getElementsByName(name);

        	checkall   = document.getElementsByName("checkall");
            checkall   = checkall[0];

        	i = 0;

        	while (element = checkboxes[i]) {

        		if (element.type == 'checkbox'){
        		
                    if(checkall.checked == true) {
                        element.checked = true;
                    }
                    else {
                        element.checked = false;
        			}
        		}
        		i++;
        	}
        
        	return true;
            
        }
        
        function checkbox_check(name) {
            
            checkboxes = document.getElementsByName(name);

        	i = 0;
            countchecked = 0;
            
        	while (element = checkboxes[i]) {

        		if (element.type == 'checkbox'){
        		
                    if(element.checked == true) {
                        countchecked++;
                    }
        		}
        		i++;
        	}

            if(i == countchecked) {
                
                checkall   = document.getElementsByName("checkall");
                checkall   = checkall[0];
                checkall.checked = true;
                
            }
            else {
                checkall.checked = false;
            }
            
        	return true;
            
        }
        
</script>