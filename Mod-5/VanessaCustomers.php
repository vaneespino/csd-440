
<?php
// Create a multidimensional associative array of 10 customers
$customers = [
    [
        'first_name' => 'Meredith',
        'last_name'  => 'Grey',
        'age'        => 28,
        'phone'      => '404-765-9076'
    ],
    [
        'first_name' => 'Derek',
        'last_name'  => 'Shepherd',
        'age'        => 36,
        'phone'      => '678-908-5064'
    ],
    [
        'first_name' => 'Christina',
        'last_name'  => 'Yang',
        'age'        => 28,
        'phone'      => '404-535-6743'
    ],
    [
        'first_name' => 'Miranda',
        'last_name'  => 'Bailey',
        'age'        => 32,
        'phone'      => '678-236-6945'
    ],
    [
        'first_name' => 'Richard',
        'last_name'  => 'Webber',
        'age'        => 56,
        'phone'      => '770-456-2365'
    ],
    [
        'first_name' => 'Amelia',
        'last_name'  => 'Shepherd',
        'age'        => 27,
        'phone'      => '406-258-0106'
    ],
    [
        'first_name' => 'Alex',
        'last_name'  => 'Karev',
        'age'        => 29,
        'phone'      => '470-327-5639'
    ],
    [
        'first_name' => 'Owen',
        'last_name'  => 'Hunt',
        'age'        => 36,
        'phone'      => '706-563-9675'
    ],
    [
        'first_name' => 'April',
        'last_name'  => 'Kepner',
        'age'        => 26,
        'phone'      => '678-435-7828'
    ],
    [
        'first_name' => 'Jackson',
        'last_name'  => 'Avery',
        'age'        => 29,
        'phone'      => '706-478-2394'
    ]
];

// Helper function to render customer arrays into an HTML table
function displayCustomerTable($customerList) {
    if (empty($customerList)) {
        echo "<p>No matching records found.</p>";
        return;
    }

    echo "<table>";
    echo "<thead><tr><th>First Name</th><th>Last Name</th><th>Age</th><th>Phone Number</th></tr></thead>";
    echo "<tbody>";
    foreach ($customerList as $customer) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($customer['first_name']) . "</td>";
        echo "<td>" . htmlspecialchars($customer['last_name']) . "</td>";
        echo "<td>" . htmlspecialchars($customer['age']) . "</td>";
        echo "<td>" . htmlspecialchars($customer['phone']) . "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Directory</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; line-height: 1.6; }
        h1, h2 { color: #333; }
        table { width: 100%; max-width: 650px; border-collapse: collapse; margin-bottom: 30px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>

    <h1>Customer Management System</h1>

    <!-- 1. Display Full Customer List -->
    <h2>All Customers (<?php echo count($customers); ?> Total)</h2>
    <?php displayCustomerTable($customers); ?>

    <!-- 2. Search by Age using array_filter() -->
    <h2>Filter 1: Customers Age 35 and Older (Using <code>array_filter</code>)</h2>
    <?php
    $olderCustomers = array_filter($customers, function($customer) {
        return $customer['age'] >= 35;
    });
    displayCustomerTable($olderCustomers);
    ?>

    <!-- 3. Search by Last Name using array_column() and array_search() -->
    <h2>Filter 2: Find Customer with Last Name "Grey" (Using <code>array_column</code> &amp; <code>array_search</code>)</h2>
    <?php
    $lastNames = array_column($customers, 'last_name');
    $foundIndex = array_search('Grey', $lastNames);

    if ($foundIndex !== false) {
        // Wrap the single customer in an array so our table function can render it
        displayCustomerTable([$customers[$foundIndex]]);
    } else {
        echo "<p>Customer not found.</p>";
    }
    ?>

    <!-- 4. Search by Phone Number ending using array_filter() -->
    <h2>Filter 3: Customers with Phone Numbers Ending in '28' or '64'</h2>
    <?php
    $phoneMatches = array_filter($customers, function($customer) {
        return str_ends_with($customer['phone'], '28') || str_ends_with($customer['phone'], '64');
    });
    displayCustomerTable($phoneMatches);
    ?>

</body>
</html>