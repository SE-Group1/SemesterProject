<html>
    <?php require '../tools.php'; ?>
    <?php require '../links.php'; 
    requireLoggedIn();
    ?>
<head>
<title>My first chart using FusionCharts Suite XT</title>
<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.fint.js?cacheBust=56"></script>
<script type="text/javascript">
 FusionCharts.ready(function() {
  var revenueChart = new FusionCharts({
    type: 'column3d',
    renderAt: 'chart-container',
    width: '1000',
    height: '500',
    dataFormat: 'json',
    dataSource: {
      "chart": {
        "caption": "Top Connections",
        "subCaption": "on HookedUp",
        "xAxisName": "Names",
        "yAxisName": "Connections",
        "paletteColors": "#0075c2",
        "valueFontColor": "#ffffff",
        "baseFont": "Helvetica Neue,Arial",
        "captionFontSize": "14",
        "subcaptionFontSize": "14",
        "subcaptionFontBold": "0",
        "placeValuesInside": "1",
        "rotateValues": "0",
        "showShadow": "1",
        "divlineColor": "#999999",
        "divLineIsDashed": "1",
        "divlineThickness": "1",
        "divLineDashLen": "1",
        "divLineGapLen": "1",
        "canvasBgColor": "#ffffff"
      },
     <?php $Bill =  "<img src='../companies/papajohns.jpeg'>" ;?>

      "data": [{
        "label": "<?php echo $Bill?>",
        "value": "430"    
      }, {
        "label": "Bill",
        "value": "400"
      }, {
        "label": "Fred",
        "value": "392"
      }, {
        "label": "Steve",
        "value": "375"
      }, {
        "label": "George",
        "value": "340"
      }, {
        "label": "Julia",
        "value": "325"
      }, {
        "label": "Stephanie",
        "value": "315"
      }, {
        "label": "Gregory",
        "value": "310"
      }, {
        "label": "Silvia",
        "value": "300"
      }, {
        "label": "You",
        "value": "296"
      }]
    }
  });
  revenueChart.render();
});
</script>
</head>
<body>
    <?php require '../navbar.php';?>
  <div id="chart-container" align="center">FusionCharts XT will load here!</div>
</body>
</html>