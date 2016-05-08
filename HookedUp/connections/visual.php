<?php require '../tools.php'; 
    requireLoggedIn();
    
    $result = makeAPIRequest("/api/user/connectiongraph/", "GET", array(
        'userId' => getUserId()
    ));
    
    $connectionList = $result['result'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require '../links.php'; ?>
    <script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
    <script type="text/javascript" src="http://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.fint.js?cacheBust=56"></script>
    <script type="text/javascript">
    
    <?php
        $numUsers = count($connectionList);
        
        $annotationItems = array();
        $imageUrls = array();
        $values = array();
        
        for($i = 0; $i < 10; $i++) {
          
            if($i < $numUsers) {
                $imageId = $connectionList[$i]['profileImageId'];
            
                $annotationItem = array(
                    "type" => "image",
                    "url" => getImageUrl($imageId),
                    "x" => '$dataset.0.set.' . $i . ".startX + 3",
                    "y" => '$dataset.0.set.' . $i . ".startY + 3",
                    "toX" => '$dataset.0.set.' . $i . ".startX + 47",
                    "toY" => '$dataset.0.set.' . $i . ".startY + 47"
                );
                
                array_push($annotationItems, $annotationItem);
            }
          
            $value = $i < $numUsers ? $connectionList[$i]['numConnections'] : 0;
            array_push($values, $value);
        }
    ?>
    
    var dataSource = {
      "chart": {
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
        
        "annotations": {
            "width": "500",
            "height": "300",
            "autoScale": "1",
            "groups": [
                {
                    "id": "user-images",
                    "xScale_": "20",
                    "yScale_": "20",
                    "showBelow": "0",
                    "items": <?= json_encode($annotationItems); ?>
                }
            ]
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
      
      
    
      FusionCharts.ready(function() {
          var revenueChart = new FusionCharts({
              type: 'column2d',
              renderAt: 'chart-container',
              width: '1000',
              height: '500',
              dataFormat: 'json',
              dataSource: dataSource
        });
        revenueChart.render();
    });
  </script>
</head>
<body>
    <?php require '../navbar.php';?>
    <div class="col-md-12">
        <h2 class="page-title text-center">Who's HookedUp the most?</h2>
        <div id="chart-container" align="center"></div>
    </div>
</body>
</html>