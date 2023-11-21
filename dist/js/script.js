///chart1

var xValues2 = ["Produit 1", "Produit 2", "Produit 3", "Produit 4", "Produit 5"];
var yValues2 = [55, 49, 44, 24, 15, 0];
var barColors2 = ["#285197", "#285197","#285197","#285197","#285197"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues2,
    datasets: [{
      backgroundColor: barColors2,
      data: yValues2
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Les produits les plus rentable"
    }
  }
});

///chart2

	new Chart(document.getElementById("line-chart"), {
		type : 'line',
		data : {
			labels : [ "sem1", "sem2", "sem3", "sem4", "sem5", "sem6",
            "sem7", "sem8", "sem9", "sem10" ],
			datasets : [
					{
						data : [ 186, 205, 1321, 1516, 2107,
								2191, 3133, 3221, 4783, 5478 ],
						label : "Produits",
						borderColor : "#3cba9f",
						fill : false
					}]
		},
		options : {
			title : {
				display : true,
				text : 'Revenu prévu de Produit 1'
			}
		}
	});



  

  