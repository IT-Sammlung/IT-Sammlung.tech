<?php include_once('./includes/header.php') ?>


<?php
function getData() {
  require("includes/datacon.php");
  // Erzeuge Array mit Anfangswerten für Überschrift
  $encode = [["Monat", "Besucher"]];
  // SQL-Abfrage in welcher aus dem timestamp die Anzahl je Monat ausgegeben wird
  $query = "SELECT DATE_FORMAT(t.timestmp, '%m') AS 'Monat', COUNT(*) FROM totalhits as t GROUP BY Monat";
  // Loope durch jeden zurückgegebenen Datensatz
  foreach($pdo->query($query) as $row) {
    // Füge zu hinterst dem Array die Werte hinzu
    array_push($encode, [$row['0'], intval($row['1'])]);
  }
  // Rückgabe mit json_encode damit es an JS übergeben werden kann
  return json_encode($encode);
}
 ?>


<!-- Line Chart Google API: https://developers.google.com/chart/interactive/docs/gallery/linechart  -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
     google.charts.load('current', {'packages':['corechart']});
     google.charts.setOnLoadCallback(drawChart);
     //Übergebe PHP Array an JavaScript
     var myData = <?php echo getData() ?>;
     function drawChart() {
       // Übergebe Arraywerte
       var data = google.visualization.arrayToDataTable(myData);
       var options = {
         title: 'Besucher pro Monat',
         curveType: 'function',
         backgroundColor: '#F3FFF0',
         legend: { position: 'none' }
       };
       var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
       chart.draw(data, options);
     }
   </script>
<!-- Erzeuge div in welchem die Chart gezeichnet wird.  -->
<div id="curve_chart"></div>
<div id="sourceCodeAnalytics1" style="color: #009688; padding-top: 10px; text-align: center; background-color: #F3FFF0; width: 50%; margin: 0 auto;"> Source Code</div>
<div id="sourceCodeAnalytics1Content" style="max-width: 800px; margin-left: auto; margin-right: auto;">
<script src="https://gist.github.com/IT-Sammlung/cd105740943e1be4a9cc8cccb11b164c.js"></script>
</div>
<?php include_once('./includes/footer.php') ?>
