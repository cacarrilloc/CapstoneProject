window.onload = function() {
	addEventListeners();
}

function addEventListeners() {
$('#searchInv').on('click', function(e) {
	e.preventDefault();
	var data = $(this).serialize();
		$.ajax({
			url: './ajax.php',
			method: 'POST',
			dataType: 'json',
			data: data,
			success: renderTable	
		});
	});
}



function renderTable(data) {
	$('#tableTemplate').html('');
	var rData = JSON.parse(data.results);
	if(rData.length) {
														//var body = document.body;
		var table = document.createElement('table');
		table.className = 'table table-striped';
		var tBody = document.createElement('tbody');
		var tr = document.createElement('tr');
				
			//set headers
		var th = document.createElement('th');
		th.appendChild(document.createTextNode("Inventory ID"));
		tr.appendChild(th);
		var th = document.createElement('th');
		th.appendChild(document.createTextNode("Book Name"));
		tr.appendChild(th);
		var th = document.createElement('th');
		th.appendChild(document.createTextNode("Magazine Name"));
		tr.appendChild(th);
		
		tBody.appendChild(tr); //append header to tBody
		for(var i = 0; i < rData.length; i++) {
			tr = document.createElement('tr'); //new row for each 
			for(var j in rData[i]) {
				var td = document.createElement('td');
				var entry = rData[i][j];
				//if(j === 'date') {
				//	entry = entry.substring(5,7) + "/" +  entry.substring(8,10) + "/" + entry.substring(0,4);
				//}
				td.appendChild(document.createTextNode(entry));
				tr.appendChild(td); //add each entry to row
			}//second for
				//this created an InvalidCharacterError - tag name 'btn...' not valid
			//var editButton = document.createElement('btn btn-default edit');
			tBody.appendChild(tr); //add row to tBody			
		} //first for
		table.appendChild(tBody);
		$('.tableTemplate').append(table); //unsure if this will work
		
	} else {
		$('.tableTemplate').html('</br></br><h4 class="centerMe"><strong>No results found!</strong></4>');
	}
}


	
