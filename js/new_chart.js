 
var chart_url = "http://localhost/betting/frontend/admin/chart_json_export.php";
var resp = 
$.ajax({
    url: chart_url, 
    async: false,
    dataType: 'json'
}).responseText;

//var resp = '{"labels":[1,2,3,4],"series":[1,2,3,4]}';
 
 //var resp ='{"labels":[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28],"series":[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,57,5,17,0,2,0,0,0]}';
 //var myJSON = JSON.stringify(resp);
//alert(myJSON);

 var JSONObject = JSON.parse(resp);
 console.log(JSONObject.labels);
 //[1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28]
 console.log(JSONObject.series);
 //[0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 57, 5, 17, 0, 2, 0, 0, 0]
 
 var data = {"labels":JSONObject.labels, "series":[JSONObject.series]};
 var prefix_Y = 'Rs';
 var postfix_Y = '';
 var config = {
    top: 10,
    low: 0,
    showPoint: true,
    fullWidth: true,
    plugins: [
Chartist.plugins.tooltip()
],
    axisY: {
        labelInterpolationFnc: function (value) {
            return prefix_Y + (value / 1) + postfix_Y;
        }
    },
    showArea: true
};
 
 //ct-visits
 var chart = new Chartist.Line('#ct-visits', data , config);
