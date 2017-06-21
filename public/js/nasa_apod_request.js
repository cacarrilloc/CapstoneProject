var urlVal;
var apiKey ="9aS6vK9qV5OgSCheuMJFpPtQU5iC6a30DgsY0LMc";

                document.addEventListener('DOMContentLoaded', bindButtons); //activate zipButton
                
                function bindButtons(){ 
                    document.getElementById('submit').addEventListener('click',function(event){ 
                    
                    var req = new XMLHttpRequest(); 
                    req.open("GET", "https://api.nasa.gov/planetary/apod?api_key=" + apiKey, true);
                           
                       
                    req.addEventListener('load', function(){ 
                        if(req.status >= 200 && req.status < 400)
                        { 
                            var response = JSON.parse(req.responseText); 
                            console.log(response); 
                            urlVal = document.getElementById('showname').textContent = response.hdurl;
                            }} )
                    req.send(null);
                    event.preventDefault(); }
                    )
                    }
					
	function VarFunction() {
		var phpVar =document.getElementById('showname').textContent;   
		window.location.href = "show_apod_request.php?jsVar=" + phpVar;}
