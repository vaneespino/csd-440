
<?php
class VanessaMyInteger {
    private int $value;

    // Constructor to initialize the integer value
    public function __construct(int $value) {
        $this->value = $value;
    }

    // Getter method
    public function getValue(): int {
        return $this->value;
    }

    // Setter method
    public function setValue(int $value): void {
        $this->value = $value;
    }

    // check if a given integer is even
    public function isEven(int $num): bool {
        return ($num % 2) === 0;
    }

    // check if a given integer is odd
    public function isOdd(int $num): bool {
        return ($num % 2) !== 0;
    }

    // check if the stored integer is prime
    public function isPrime(): bool {
        if ($this->value <= 1) {
            return false;
        }
        for ($i = 2; $i <= sqrt($this->value); $i++) {
            if ($this->value % $i === 0) {
                return false;
            }
        }
        return true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyInteger Class Test</title>
</head>
<body>
    <h1>Testing VanessaMyInteger Class</h1>

    <?php
    // Create two instances of the class
    $int1 = new VanessaMyInteger(7);
    $int2 = new VanessaMyInteger(12);

    // display boolean results as Yes/No
    function boolToText(bool $val): string {
        return $val ? "Yes" : "No";
    }

    // Test Instance 1
    echo "<h2>Instance 1 (Initial Value: " . $int1->getValue() . ")</h2>";
    echo "<ul>";
    echo "<li>Is " . $int1->getValue() . " even? " . boolToText($int1->isEven($int1->getValue())) . "</li>";
    echo "<li>Is " . $int1->getValue() . " odd? " . boolToText($int1->isOdd($int1->getValue())) . "</li>";
    echo "<li>Is " . $int1->getValue() . " prime? " . boolToText($int1->isPrime()) . "</li>";
    echo "</ul>";

    // Test Instance 2
    echo "<h2>Instance 2 (Initial Value: " . $int2->getValue() . ")</h2>";
    echo "<ul>";
    echo "<li>Is " . $int2->getValue() . " even? " . boolToText($int2->isEven($int2->getValue())) . "</li>";
    echo "<li>Is " . $int2->getValue() . " odd? " . boolToText($int2->isOdd($int2->getValue())) . "</li>";
    echo "<li>Is " . $int2->getValue() . " prime? " . boolToText($int2->isPrime()) . "</li>";
    echo "</ul>";

    // Test Setter and Getter on Instance 2
    $int2->setValue(19);
    echo "<h2>Instance 2 After setValue(19)</h2>";
    echo "<ul>";
    echo "<li>New Value (via getValue): " . $int2->getValue() . "</li>";
    echo "<li>Is 19 even? " . boolToText($int2->isEven(19)) . "</li>";
    echo "<li>Is 19 odd? " . boolToText($int2->isOdd(19)) . "</li>";
    echo "<li>Is " . $int2->getValue() . " prime? " . boolToText($int2->isPrime()) . "</li>";
    echo "</ul>";
    ?>
</body>
</html>