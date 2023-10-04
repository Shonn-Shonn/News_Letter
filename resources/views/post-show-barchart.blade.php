<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>

<style>

</style>

<body>
    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
</body>

<script>
var Aug = <?php echo $aug ?>;
var Sep = <?php echo $sep ?>;
var Oct = <?php echo $oct ?>;

const xValues = ["August", "September", "October"];
const yValues = [Aug,Sep,Oct];
const barColors = [ "#b91d47",
"#00aba9",
  "#2b5797",];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {
        display: false,
    },
    title: {
      display: true,
      text: "Most Posting Month"
    }
  }
});
</script>
</html>
