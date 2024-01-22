<?php
class ValidateController
{
 /**
     * Check if all inputs are set in the $_POST variable
     *
     * @param array $inputs The array of inputs to be checked
     * @return bool
     */
    function settedInputs(array $inputs) : bool
    {
        $flag = true;
        foreach ($inputs as $input) {
            if (!isset($_POST[$input]) or empty($_POST[$input]) or $_POST[$input] != "") {
                $flag = false;
            }
        }
        return $flag;
    }
    
    /**
     * Return an array of sanitized and trimmed input values.
     *
     * @param array $inputs The array of input values to sanitize and trim
     * @return array The sanitized and trimmed input values
     */
    function returnInputs(array $inputs) : array
    {
        $inputsArray = [];
        foreach ($inputs as $input) {
            $inputsArray[$input] = htmlentities(trim($_POST[$input]));
            if ($input == "password") {
                $inputsArray[$input] = password_hash($inputsArray[$input], 1);
            }
        }
        return $inputsArray;
    }
}