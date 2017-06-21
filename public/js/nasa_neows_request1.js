var urlVal2;
var apiKey ="9aS6vK9qV5OgSCheuMJFpPtQU5iC6a30DgsY0LMc";
var min = 999;
var max = 1002;
var solRandom = Math.floor(Math.random() * (max - min) ) + min;


                document.addEventListener('DOMContentLoaded', actButton); //activate zipButton

                function actButton(){ 
					 
                    document.getElementById('submit2').addEventListener('click',function(event){ 
                    
                    var req = new XMLHttpRequest(); 
                    req.open("GET", "https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?sol=" +1001+"&camera=navcam&api_key=" + apiKey, true);
                           
                       
                    req.addEventListener('load', function(){ 
                        if(req.status >= 200 && req.status < 400)
                        { 
                            var response = JSON.parse(req.responseText); 
                            console.log(response); 
                            urlVal2 = document.getElementById('showname2').textContent = response.photos[0].img_src;
                            }} )
                    req.send(null);
                    event.preventDefault(); }
                    )
                    }


	function VarFunction2() {
		var phpVar =document.getElementById('showname2').textContent;
		window.location.href = "show_neows_request1.php?jsVar=" + phpVar;}

