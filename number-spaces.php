<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fancy Mobile Number Formatter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f7f7f7;
        }
        textarea, input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            background: white;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Fancy Mobile Number Formatter</h1>
    <p>Paste your mobile numbers below, and click "Format Numbers" to apply the custom spacing.</p>
    
    <form method="POST">
        <textarea name="numbers" rows="10" placeholder="Paste your numbers here (one per line)"></textarea>
        <button type="submit">Format Numbers</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["numbers"])) {
        // Function to format a single number based on length
        function formatNumber($number) {
            $patterns = [
                10 => '## ### ## ###',      // e.g., 8469 666666
                9  => '## ####### #',      // e.g., 75 999999 74
                8  => '### #####',         // e.g., 809 2222202
                7  => '##### ##',          // e.g., 95346 77777
                6  => '### ## ###',        // e.g., for custom fallback pattern
                5  => '##### #####',       // e.g., for 5-digit numbers
                4  => '#### #### ##',      // e.g., for numbers with 4 digits
                3  => '## #### ####',      // e.g., for 3-digit numbers
                2  => '# ### ### ###',     // e.g., for 2-digit numbers
                1  => '### ### ### #'      // e.g., for single-digit numbers
            ];

            // Clean the number (remove non-numeric characters)
            $number = preg_replace('/[^0-9]/', '', $number);
            $length = strlen($number);

            // Check if we have a pattern for this length
            if (isset($patterns[$length])) {
                $pattern = $patterns[$length];
                $formatted = '';
                $index = 0;

                // Apply the pattern
                for ($i = 0; $i < strlen($pattern); $i++) {
                    if ($pattern[$i] === '#') {
                        if (isset($number[$index])) {
                            $formatted .= $number[$index];
                            $index++;
                        }
                    } else {
                        $formatted .= $pattern[$i];
                    }
                }
                return $formatted;
            }

            // If no pattern matches, return the original number
            return $number;
        }

        // Get the input numbers and process them
        $inputNumbers = explode("\n", $_POST["numbers"]);
        $formattedNumbers = array_map('formatNumber', $inputNumbers);

        echo '<div class="result"><h3>Formatted Numbers:</h3><pre>';
        echo implode("\n", $formattedNumbers);
        echo '</pre></div>';
    }
    ?>
</body>
</html>
