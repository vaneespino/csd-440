
<?php
$errors = [];


if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: VanessaForm.html");
    exit();
}

// Retrieve and trim input values safely
$full_name  = trim($_POST["full_name"] ?? "");
$email      = trim($_POST["email"] ?? "");
$age        = trim($_POST["age"] ?? "");
$gpa        = trim($_POST["gpa"] ?? "");
$start_date = trim($_POST["start_date"] ?? "");
$department = trim($_POST["department"] ?? "");
$enrollment = trim($_POST["enrollment"] ?? "");

// 1. Validate Full Name 
if (empty($full_name)) {
    $errors[] = "Full Name is required.";
} elseif (!preg_match("/^[a-zA-Z\s'-]{2,50}$/", $full_name)) {
    $errors[] = "Full Name must be 2–50 characters and contain only letters, spaces, hyphens, or apostrophes.";
}

// 2. Validate Email 
if (empty($email)) {
    $errors[] = "Email Address is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Please enter a valid Email Address.";
}

// 3. Validate Age 
if ($age === "") {
    $errors[] = "Age is required.";
} elseif (filter_var($age, FILTER_VALIDATE_INT, ["options" => ["min_range" => 16, "max_range" => 120]]) === false) {
    $errors[] = "Age must be a valid whole number between 16 and 120.";
}

// 4. Validate GPA 
if ($gpa === "") {
    $errors[] = "Current GPA is required.";
} elseif (filter_var($gpa, FILTER_VALIDATE_FLOAT) === false || (float)$gpa < 0.0 || (float)$gpa > 4.0) {
    $errors[] = "Current GPA must be a valid decimal number between 0.00 and 4.00.";
}

// 5. Validate Start Date 
if (empty($start_date)) {
    $errors[] = "Preferred Start Date is required.";
} else {
    $date_parts = explode("-", $start_date);
    if (count($date_parts) !== 3 || !checkdate((int)$date_parts[1], (int)$date_parts[2], (int)$date_parts[0])) {
        $errors[] = "Preferred Start Date must be a valid calendar date.";
    }
}

// 6. Validate Department 
$allowed_departments = ["Business", "Arts and Science", "Economic Development", "Health Sciences"];
if (empty($department)) {
    $errors[] = "Please select a Department.";
} elseif (!in_array($department, $allowed_departments, true)) {
    $errors[] = "Invalid Department selected.";
}

// 7. Validate Enrollment Status (Must match an allowed radio choice)
$allowed_enrollment = ["Full-Time", "Part-Time"];
if (empty($enrollment)) {
    $errors[] = "Please select an Enrollment Status.";
} elseif (!in_array($enrollment, $allowed_enrollment, true)) {
    $errors[] = "Invalid Enrollment Status selected.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo empty($errors) ? "Submission Confirmed" : "Submission Error"; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            padding: 40px 20px;
        }
        .card {
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 520px;
        }
        .error-header {
            color: #d9534f;
            border-bottom: 2px solid #d9534f;
            padding-bottom: 10px;
        }
        .success-header {
            color: #28a745;
            border-bottom: 2px solid #28a745;
            padding-bottom: 10px;
        }
        ul.error-list {
            background-color: #fdf2f2;
            border: 1px solid #f5c6cb;
            color: #721c24;
            padding: 15px 15px 15px 35px;
            border-radius: 4px;
        }
        ul.error-list li {
            margin-bottom: 6px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #dddddd;
        }
        th {
            background-color: #f8f9fa;
            width: 42%;
            color: #333333;
        }
        .btn-back {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 18px;
            background-color: #6c757d;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }
        .btn-back:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>

<div class="card">
    <?php if (!empty($errors)): ?>
        <!-- ERROR REPORT DISPLAY -->
        <h2 class="error-header">Submission Failed</h2>
        <p>Please correct the following issues before resubmitting your form:</p>
        <ul class="error-list">
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
        </ul>
        <a href="javascript:history.back()" class="btn-back">&larr; Go Back and Fix Errors</a>

    <?php else: ?>
        <!-- WELL-FORMATTED DATA DISPLAY -->
        <h2 class="success-header">Registration Successful</h2>
        <p>Thank you! Your information has been verified and recorded below:</p>
        <table>
            <tr>
                <th>Full Name</th>
                <td><?php echo htmlspecialchars($full_name); ?></td>
            </tr>
            <tr>
                <th>Email Address</th>
                <td><?php echo htmlspecialchars($email); ?></td>
            </tr>
            <tr>
                <th>Age</th>
                <td><?php echo htmlspecialchars($age); ?> years old</td>
            </tr>
            <tr>
                <th>Current GPA</th>
                <td><?php echo number_format((float)$gpa, 2); ?></td>
            </tr>
            <tr>
                <th>Preferred Start Date</th>
                <td><?php echo htmlspecialchars($start_date); ?></td>
            </tr>
            <tr>
                <th>Department</th>
                <td><?php echo htmlspecialchars($department); ?></td>
            </tr>
            <tr>
                <th>Enrollment Status</th>
                <td><?php echo htmlspecialchars($enrollment); ?></td>
            </tr>
        </table>
        <a href="VanessaForm.html" class="btn-back">Submit Another Response</a>
    <?php endif; ?>
</div>

</body>
</html>