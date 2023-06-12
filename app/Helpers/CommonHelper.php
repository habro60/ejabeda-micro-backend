<?php

use PhpParser\Node\Expr\Cast\Double;

if (!function_exists('get_org_number')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function get_org_number($formerReference = "habro-001")
    {
        $parts = explode("-", $formerReference);
        $numbers = $parts[1];
        $letters = $parts[0];
        
        if($numbers == "999"){
           $nextLetters = ++$letters;
           $nextNumbers = 1;
        } else {
            $nextLetters = $letters;
            $nextNumbers = ++$numbers;
        }
        
        $nextReference = $nextLetters."-".sprintf('%03d', $nextNumbers);       
        
        return $nextReference;
    }


    
}

if (!function_exists('calculateDatesAfterMonths')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function calculateDatesAfterMonths($effectDate) {

        $currentDate = $effectDate;

            $currentDate = date('Y-m-d', strtotime($currentDate. ' + 1 month'));
           
    
        return $currentDate;
    }
    
    


    
}









