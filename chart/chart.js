
var MyChart;



$(document).ready(function(){
    var myChartID = $('#myProjectChartProgress'); //get ID of my piechart 
    
    //ajax to call  the data from the database
    $.ajax({
        type: "get",
        url: "chart/chartdata.php",
        success: function (jsondata) {
            var response = JSON.parse(jsondata);
            const data = {
                labels: [
                  'Past Due',
                  'Completed',
                  'Ongoing'
                ],
                datasets: [{
                  label: 'My First Dataset',
                  data: [response.pastdue,response.completed, response.ongoing],
                  backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(0, 204, 102)',
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