
var MyChart;



$(document).ready(function(){
    var myChartID = $('#myProjectChartProgress'); //get ID of my piechart 
    
    //ajax to call  the data from the database
    $.ajax({
        type: "get",
        url: "chart/chartdata.php",
        success: function (data) {
            const data = {
                labels: [
                  'Red',
                  'Blue',
                  'Yellow'
                ],
                datasets: [{
                  label: 'My First Dataset',
                  data: [300, 50, 100],
                  backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                  ],
                  hoverOffset: 4
                }]
              };
              const config = {
                type: 'doughnut',
                data: data,
              };
            MyChart = new Chart(
                myChartID,
                config
              );
        },
      });

    //render chart base on the config above
    
});