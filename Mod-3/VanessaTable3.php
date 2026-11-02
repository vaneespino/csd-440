<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Number Matrix Table - Module 3</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #A5A1D1;
        }
        table {
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            background-color: #ffffff;
        }
        td {
            border: 1px solid #bdc3c7;
            padding: 12px 20px;
            text-align: center;
            font-weight: bold;
            color: #2c3e50;
        }
        tr:nth-child(even) {
            background-color: #ecf0f1;
        }
    </style>
</head>
<body>

    <h2>2D Random Number Generator (Module 3 - Functional)</h2>

    <!-- Opening Table Tag outside of PHP -->
    <table border="1">
        
        <?php
        /**
         * File Name: VanessaTable3.php
         * Description: Generates a 2D matrix structure and pulls calculations from an external function file.
         * Author: Vanessa Espino
         * Date: November 1, 2026
         */

        // 1. LINK TO YOUR EXTERNAL FILE HERE:
        require_once 'VanessaFunctions.php';

        // Define dimensions for the two-dimensional table structure
        $totalRows = 8;
        $totalCols = 5;

        // Outer loop controls row generation
        for ($row = 1; $row <= $totalRows; $row++) {
        ?>
            <!-- Opening Table Row Tag outside of PHP -->
            <tr>
            
            <?php
            for ($col = 1; $col <= $totalCols; $col++) {
                
                // Construct two independent random parameters
                $randomA = rand(1, 150);
                $randomB = rand(1, 150);

                // 2. CALL THE EXTERNAL FUNCTION HERE:
                $computedSum = generateCellSum($randomA, $randomB);
            ?>
                <!-- Table Cell Tag outside of PHP, utilizing short echo to embed value -->
                <td><?= $computedSum; ?></td>
            
            <?php
            } 
            ?>

            <!-- Closing Table Row Tag outside of PHP -->
            </tr>

        <?php
        } 
        ?>

    <!-- Closing Table Tag outside of PHP -->
    </table>

</body>
</html>