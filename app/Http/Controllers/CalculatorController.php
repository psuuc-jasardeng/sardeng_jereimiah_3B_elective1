<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function calculate($operation1, $num1, $num2, $operation2, $num3, $num4)
    {
        // Konbersyon ng input sa integer
        $num1 = (int) $num1;
        $num2 = (int) $num2;
        $num3 = (int) $num3;
        $num4 = (int) $num4;

        // Pagsasagawa ng unang operasyon
        $result1 = $this->performOperation($operation1, $num1, $num2);
        // Pagsasagawa ng pangalawang operasyon
        $result2 = $this->performOperation($operation2, $num3, $num4);

        // Kulay ng background depende kung EVEN o ODD ang resulta
        $bgColor1 = ($result1 !== "Error: Cannot divide by zero." && $result1 % 2 == 0) ? 'green' : 'blue';
        $bgColor2 = ($result2 !== "Error: Cannot divide by zero." && $result2 % 2 == 0) ? 'green' : 'blue';

        // Kulay ng text depende kung EVEN o ODD ang input number
        $textColor1 = ($num1 % 2 == 0) ? 'orange' : 'blue';
        $textColor2 = ($num2 % 2 == 0) ? 'orange' : 'blue';
        $textColor3 = ($num3 % 2 == 0) ? 'orange' : 'blue';
        $textColor4 = ($num4 % 2 == 0) ? 'orange' : 'blue';

        // Output ng resulta
        echo "<h1>Jereimiah Sardeng - BSIT 3B</h1>";

        // Unang operasyon
        echo "<p style='color: $textColor1;'>Value 1: $num1</p>";
        echo "<p style='color: $textColor2;'>Value 2: $num2</p>";
        echo "<p>Operator: $operation1</p>";
        echo $this->displayResult($result1, $bgColor1);

        echo "<br><br>";

        // Pangalawang operasyon
        echo "<p style='color: $textColor3;'>Value 1: $num3</p>";
        echo "<p style='color: $textColor4;'>Value 2: $num4</p>";
        echo "<p>Operator: $operation2</p>";
        echo $this->displayResult(
            $result2,
            $bgColor2,

        );
    }

    // Function para gawin ang operasyon
    private function performOperation($operation, $num1, $num2)
    {
        switch ($operation) {
            case 'add':
                return $num1 + $num2;
            case 'subtract':
                return $num1 - $num2;
            case 'multiply':
                return $num1 * $num2;
            case 'divide':
                return ($num2 == 0) ? "Error: Cannot divide by zero." : $num1 / $num2;
            default:
                return "Invalid operation.";
        }
    }

    // Function para ipakita ang resulta
    private function displayResult($result, $bgColor)
    {
        if ($result === "Error: Cannot divide by zero." || $result === "Invalid operation.") {
            return "<p style='color: red;'>$result</p>";
        } else {
            return "<div style='background-color: $bgColor; color: white; padding: 10px; display: inline-block;'>
                        Result: $result
                    </div>";
        }
    }
}
