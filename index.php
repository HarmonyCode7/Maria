<?php
    /*
    The function ArraysAssoc deals with an array of arrays of associative arrays.
    * $getThis is the key whose value we want to get
    * $where looks for a key with a certain value
    * Example an  key = "occupation" has value "employee" so match $getThis with it
    *
    */

    function ArraysAssoc($arraysAssoc, $getThis , $where)
    {
        $basicArray = array();
        foreach($arraysAssoc as $arrayAssoc)
        {
            foreach($arrayAssoc as $key => $val)
            {
                if($arrayAssoc[$key] == $where)
                {
                    array_push($basicArray, $arrayAssoc[$getThis]);
                }
            }
        }
        return $basicArray;
    }

    function Sum($basicArray)
    {
        $sum = 0;
        if($basicArray == NULL || count($basicArray) < 1)
        {
            return NULL;
        }
        for($i = 0; $i < count($basicArray); ++$i)
        {
            $sum += $basicArray[$i];
        }
        return $sum;
    }
    //A basic array is  one of the form [a1,a2,a3,...,aN]
    //Mean is a function that takes a basic array as its parameter
    // Associative arrays are not considered basic arrays
    function Mean($basicArray)
    {      
        $sum = Sum($basicArray);
        return  $sum != NULL ? $sum / count($basicArray) : NULL;
    }


    $employees = array(
        array(
            "name"=>"Bob",
            "occupation" => "employee",
            "salary" => 1500,
            "speciality" => "programmer"
        ),
        array (
            "name"=>"Sally",
            "occupation" => "manager",
            "salary" => 2300,
            "speciality" => "human resources management"
        )
        ,
        array(
            "name"=>"Jane",
            "occupation" => "employee",
            "salary" => 800,
            "speciality" => "secretary"
        )
        );

        $employeesSalary = ArraysAssoc($employees, "salary", "employee");
        $managersSalary = ArraysAssoc($employees, "salary", "manager");
?>
<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
</head>
<body>
    <?php 
        echo "<h1> Mean salary of employees and managers</h1>";
        echo "<ul>";
        echo "<li> Employees: ".Mean($employeesSalary)." &euro;</li>";
        echo "<li> Managers: ".Mean($managersSalary)." &euro;</li>";
        echo "</ul>";
    ?>
</body>
</html>