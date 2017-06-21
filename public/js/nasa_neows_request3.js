var urlVal4;
var apiKey ="9aS6vK9qV5OgSCheuMJFpPtQU5iC6a30DgsY0LMc";
var min = 900;
var max = 920;
var solRandom = Math.floor(Math.random() * (max - min) ) + max;


                document.addEventListener('DOMContentLoaded', actButton); //activate zipButton

                function actButton(){ 
					 
                    document.getElementById('submit4').addEventListener('click',function(event){
                    
                    var req = new XMLHttpRequest(); 
                    req.open("GET", "https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?sol="+solRandom+"&camera=rhaz&api_key=" + apiKey, true);
                           
                       
                    req.addEventListener('load', function(){ 
                        if(req.status >= 200 && req.status < 400)
                        { 
                            var response = JSON.parse(req.responseText); 
                            console.log(response); 
                            urlVal4 = document.getElementById('showname4').textContent = response.photos[0].img_src;
                            }} )
                    req.send(null);
                    event.preventDefault(); }
                    )
                    }
					
	function VarFunction4() {
		var phpVar =document.getElementById('showname4').textContent;
		window.location.href = "show_neows_request3.php?jsVar=" + phpVar; }

