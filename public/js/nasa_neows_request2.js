var urlVal3;
var apiKey ="9aS6vK9qV5OgSCheuMJFpPtQU5iC6a30DgsY0LMc";
var min = 900;
var max = 920;
var solRandom = Math.floor(Math.random() * (max - min) ) + max;


                document.addEventListener('DOMContentLoaded', actButton); //activate zipButton

                function actButton(){ 
					 
                    document.getElementById('submit3').addEventListener('click',function(event){
                    
                    var req = new XMLHttpRequest(); 
                    req.open("GET", "https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?sol="+solRandom+"&camera=fhaz&api_key=" + apiKey, true);
                           
                       
                    req.addEventListener('load', function(){ 
                        if(req.status >= 200 && req.status < 400)
                        { 
                            var response = JSON.parse(req.responseText); 
                            console.log(response); 
                            urlVal3 = document.getElementById('showname3').textContent = response.photos[0].img_src;
                            }} )
                    req.send(null);
                    event.preventDefault(); }
                    )
                    }
					
	function VarFunction3() {
		var phpVar =document.getElementById('showname3').textContent;
		window.location.href = "show_neows_request2.php?jsVar=" + phpVar; }
