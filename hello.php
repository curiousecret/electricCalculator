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
    <form action="electric.php" method="post" class="mt-4">
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

    <?php
    
        echo "new added file";
    }
    ?>
</div>
</body>
</html>
