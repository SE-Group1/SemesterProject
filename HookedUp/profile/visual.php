<?php require '../tools.php'; 
    requireLoggedIn();
    
    $result = makeAPIRequest("/api/user/connectionlist/", "GET", array(
        'userId' => getUserId()
    ));
    
    $connectionList = $result['result'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require '../links.php'; ?>
    <title>My first chart using FusionCharts Suite XT</title>
    <script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
    <script type="text/javascript" src="http://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.fint.js?cacheBust=56"></script>
    <script type="text/javascript">
    
    <?php
        $values = array();
        $numUsers = count($connectionList);
        
        for($i = 0; $i < 10; $i++) {
            $value = $i < $numUsers ? $connectionList[$i]['numConnections'] : 0;
            array_push($values, $value);
        }
    ?>
    
      FusionCharts.ready(function() {
          var revenueChart = new FusionCharts({
              type: 'column2d',
              renderAt: 'chart-container',
              width: '1000',
              height: '500',
              dataFormat: 'json',
              dataSource: {
                "chart": {
                  "caption": "Who's HookedUp the most?",
                  "captionFontSize": "22",
                  "showBorder": "0",
                  "bgColor": "#ffffff",
                  "showCanvasBorder": "0",
                  "canvasBgColor": "#ffffff",
                  "paletteColors": "#3399ff",
                  "usePlotGradientColor": "0",
                  "plotFillAlpha": "70",
                  "plotFillHoverAlpha": "40",
                  "showPlotBorder": "0",
                  "valueFontSize": "10",
                  "valueFontBold": "1",
                  "divLineColor": "#ffffff",
                  "showAlternateHGridColor": "0",
                  "logoUrl": "../logo.png",
                  "logoPosition": "CC",
                  "logoScale": "150",
                  "logoAlpha": "02",
                  "showYAxisValues": "0"
                },

                "data": [{
                  "label": "1st",
                  "value": "<?= $values[0]; ?>"
                }, {
                  "label": "2nd",
                  "value": "<?= $values[1]; ?>"
                }, {
                  "label": "3rd",
                  "value": "<?= $values[2]; ?>"
                }, {
                  "label": "4th",
                  "value": "<?= $values[3]; ?>"
                }, {
                  "label": "5th",
                  "value": "<?= $values[4]; ?>"
                }, {
                  "label": "6th",
                  "value": "<?= $values[5]; ?>"
                }, {
                  "label": "7th",
                  "value": "<?= $values[6]; ?>"
                }, {
                  "label": "8th",
                  "value": "<?= $values[7]; ?>"
                }, {
                  "label": "9th",
                  "value": "<?= $values[8]; ?>"
                }, {
                  "label": "10th",
                  "value": "<?= $values[9]; ?>"
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