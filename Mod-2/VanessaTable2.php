<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Number Matrix Table</title>
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

    <h2>2D Random Number Generator</h2>

    <!-- Opening Table Tag outside of PHP -->
    <table border="1">
        
        <?php
        /**
         * File Name: VanessaTable2.php
         * Description: Generates a 2D matrix table using nested loops without echoing HTML structures.
         * Author: Vanessa
         * Date: October 30, 2026
         */

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
                
                // Generate a random integer value between 1 and 300
                $randomNumber = rand(1, 300);
            ?>
                <!-- Table Cell Tag outside of PHP, utilizing short echo to embed value -->
                <td><?= $randomNumber; ?></td>
            
            <?php
            } // End of inner column loop
            ?>

            <!-- Closing Table Row Tag outside of PHP -->
            </tr>

        <?php
        } // End of outer row loop
        ?>

    <!-- Closing Table Tag outside of PHP -->
    </table>

</body>
</html>