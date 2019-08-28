// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';


//
// ajaxGetGender: function () {
//     var urlPath =  'http://' + window.location.hostname + '/getGender';
//     var request = $.ajax( {
//         method: 'GET',
//         url: urlPath
//     } );
//
//     request.done( function ( response ) {
//         console.log( response );
//         charts.GetGender( response );
//     });
// }
// Pie Chart Example
// // createCompletedJobsChart: function ( response ) {
//     var ctx = document.getElementById("myPieChart");
//     var myPieChart = new Chart(ctx, {
//         type: 'pie',
//         data: {
//             labels: ["Blue", "Red", "Yellow", "Green"],
//             datasets: [{
//                 data: [12.21, 15.58, 11.25, 8.32],
//                 backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745'],
//             }],
//         },
//     });

// var ctx = document.getElementById("myPieChart1");
// var myPieChart = new Chart(ctx, {
//   type: 'pie',
//   data: {
//     labels: ["Blue", "Red", "Yellow", "Green","white","black"],
//     responsive: true,
//     datasets: [{
//       data: [12.21, 15.58, 11.25, 8.32,4.5,7.8],
//       backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745',],
//     }],
//   },
// });
