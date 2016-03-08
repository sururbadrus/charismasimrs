<table class="highchart" data-graph-container-before="1" data-graph-type="line">
  <thead>
      <tr>
          <th>Month</th>
          <th>Sales1</th>
          <th>Sales2</th>
          <th>Sales3</th>
          <th>Sales4</th>
          <th>Sales5</th>
          <th>Sales6</th>
          <th>Sales7</th>
          <th>Sales8</th>
          <th>Sales9</th>
          <th>Sales10</th>
      </tr>
   </thead>
   <tbody>
      <tr>
          <td>January</td>
          <td>8000</td>
          <td>7000</td>
          <td>9000</td>
          <td>5000</td>
          <td>6000</td>
           <td>5000</td>
          <td>5000</td>
          <td>9000</td>
          <td>6000</td>
          <td>7000</td>
      </tr>
     
  </tbody>
</table>

<script>
$(document).ready(function() {
  $('table.highchart').highchartTable({chart: {
            renderTo: 'container',
            type: 'column',
            margin: 75,
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 15,
                depth: 50,
                viewDistance: 25
            }}
        });
});

</script>