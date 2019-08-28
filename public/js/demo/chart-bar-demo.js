// // // Set new default font family and font color to mimic Bootstrap's default styling
// // Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
// // Chart.defaults.global.defaultFontColor = '#292b2c';
// //
// // //Bar Chart Example
// // //
// //
// //
// // var ctx = document.getElementById("myBarChart");
// // var myLineChart = new Chart(ctx, {
// //   type: 'bar',
// //   data: {
// //     labels: ["January", "February", "March", "April", "May", "June"],
// //     datasets: [{
// //       label: "Age",
// //       backgroundColor: "rgba(2,117,216,1)",
// //       borderColor: "rgba(2,117,216,1)",
// //       data: [4215, 5312, 6251, 7841, 9821, 14984],
// //     }],
// //   },
// //   options: {
// //     scales: {
// //       xAxes: [{
// //         time: {
// //           unit: 'month'
// //         },
// //         gridLines: {
// //           display: false
// //         },
// //         ticks: {
// //           maxTicksLimit: 6
// //         }
// //       }],
// //       yAxes: [{
// //         ticks: {
// //           min: 0,
// //           max: 15000,
// //           maxTicksLimit: 5
// //         },
// //         gridLines: {
// //           display: true
// //         }
// //       }],
// //     },
// //     legend: {
// //       display: false
// //     }
// //   }
// // });
//
// //for new
// //
// // var ctx = document.getElementById("myBarChart1");
// // var myLineChart = new Chart(ctx, {
// //     type: 'bar',
// //     data: {
// //         labels: ["January", "February", "March", "April", "May", "June"],
// //         datasets: [{
// //             label: "Revenue",
// //             backgroundColor: "rgba(2,117,216,1)",
// //             borderColor: "rgba(2,117,216,1)",
// //             data: [4215, 5312, 6251, 7841, 9821, 14984],
// //         }],
// //     },
// //     options: {
// //         scales: {
// //             xAxes: [{
// //                 time: {
// //                     unit: 'month'
// //                 },
// //                 gridLines: {
// //                     display: false
// //                 },
// //                 ticks: {
// //                     maxTicksLimit: 6
// //                 }
// //             }],
// //             yAxes: [{
// //                 ticks: {
// //                     min: 0,
// //                     max: 15000,
// //                     maxTicksLimit: 5
// //                 },
// //                 gridLines: {
// //                     display: true
// //                 }
// //             }],
// //         },
// //         legend: {
// //             display: false
// //         }
// //     }
// // });
//
//
//
// $(document).ready(function(){
//     $.ajax({
//         url: "http://' + window.location.hostname   + '/getData",
//         url: '{{route('/getData')',
//         method: "GET",
//         success: function(data) {
//             console.log(data);
//             var player = [];
//             var score = [];
//
//             for(var i in data) {
//                 player.push("Player " + data[i].playerid);
//                 score.push(data[i].score);
//             }
//
//             var chartdata = {
//                 labels: player,
//                 datasets : [
//                     {
//                         label: 'Player Score',
//                         backgroundColor: 'rgba(200, 200, 200, 0.75)',
//                         borderColor: 'rgba(200, 200, 200, 0.75)',
//                         hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
//                         hoverBorderColor: 'rgba(200, 200, 200, 1)',
//                         data: score
//                     }
//                 ]
//             };
//
//             var ctx = $("#myBarChart");
//
//             var barGraph = new Chart(ctx, {
//                 type: 'bar',
//                 data: chartdata
//             });
//         },
//         error: function(data) {
//             console.log(data);
//         }
//     });
// });
