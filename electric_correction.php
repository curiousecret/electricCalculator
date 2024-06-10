<?php
function calculateElectricityConsumption()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $voltage = floatval($_POST['voltage']);
        $current = floatval($_POST['current']);
        $rate = floatval($_POST['rate']);
        
        // Calculate Power in kWh
        $power = $voltage * $current / 1000;

        // Calculate Rate in RM (assuming 1 hour of usage)
        $rate_per_kwh = $rate / 100;

        echo "<div class='mt-4'>";
        echo "</div>";
        echo "<div class='container-fluid' style='background-color: #f0f0f0;'>";
        echo "<h2>Results</h2>";
        echo "<p>POWER: " . number_format($power, 5) . " kW</p>";
        echo "<p>RATE: " . number_format($rate_per_kwh, 3) . " RM</p>";
        echo "</div>";
        
        echo "<table class='table mt-4'>";
        echo "<thead><tr><th scope='col'>#</th><th scope='col'>Hour</th><th scope='col'>Energy (kWh)</th><th scope='col'>Total (RM)</th></tr></thead>";
        echo "<tbody>";

        for ($i = 1; $i <= 24; $i++) {
            // Calculate Total Charge for each hour
            $total_charge_per_hour = $power * $rate_per_kwh * $i;
            echo "<tr>";
            echo "<th scope='row'>" . $i . "</th>";
            echo "<td>" . $i . "</td>";
            echo "<td>" . number_format($power * $i, 5) . "</td>";
            echo "<td>" . number_format($total_charge_per_hour, 2) . "</td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electricity Consumption Calculator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Electricity Consumption Calculator</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="mt-4">
        <div class="form-group">
            <label for="voltage">Voltage (V)</label>
            <input type="text" name="voltage" id="voltage" class="form-control" required pattern="\d+(\.\d{1,2})?">
        </div>
        <div class="form-group">
            <label for="current">Current (A)</label>
            <input type="text" name="current" id="current" class="form-control" required pattern="\d+(\.\d{1,2})?">
        </div>
        <div class="form-group">
            <label for="rate">Current Rate (cents/kWh)</label>
            <input type="text" name="rate" id="rate" class="form-control" required pattern="\d+(\.\d{1,2})?">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Calculate</button>
        </div>
    </form>

    <?php calculateElectricityConsumption(); ?>
</div>
</body>
</html>
