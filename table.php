<?php


//DEAL WITH FORM DATA
$newSmartphone;

$smartphones = array("Sony"=> "400","HUAWEI"=>"340","Samsung"=>"139","Apple Iphone"=>"234");

//add new phonel
        
if(isset($_GET['submit']))
{
    $phone = $_GET['phone'];
    if(strlen($phone) != "")
    {
        $newphone = explode(",",$phone);
        if(count($newphone) == 2)
        {
           $smartphones = $smartphones + array($newphone[0]=>$newphone[1]);          
       }
    }
}


function array_push_assoc($assocArray,$key, $val)
{
    $assocArray[$key] = $val;
    return $assocArray;
}



function MinMax($dataList)
{
    if(count($dataList) < 0)
    {
        return;
    }
    $max = reset($dataList);
    $min = reset($dataList);
    
    foreach($dataList as $key => $val)
    {
        $min = $min < $val? $min : $val;
        $max = $max > $val? $max : $val;
    }
    return array($min,$max);
}

function Average($dataList)
{
    $sum = 0;
    $numPhones = 0;
    foreach($dataList as $key => $val)
    {
        $sum += (float)$val;
        $numPhones++;
    }
    //ternary operator to return 
    //average if $numPhones is more than 
    // 0 to prevent didvision by 0
    return $numPhones > 0? $sum / $numPhones : 0;
}

$phonePriceRange = MinMax($smartphones);
$minPhonePrice =  $phonePriceRange[0];
$maxPhonePrice = $phonePriceRange[1];

function printTable($css_class_selector,$callback_func,$callback_params)
{
    echo "<table class=\"".$css_class_selector."\">";
    //contents of the table decided by callback function
    
if($callback_func != NULL){
call_user_func_array($callback_func,$callback_params);
}
   echo "</table>";
}


function printKeyValTable($dataList, $th, $callback, $callbackParams)
{
    echo "<tr>
              <th>".$th[0]."</th>
              <th>".$th[1]."</th>
          </tr>";
   //Now the actual values
   foreach($dataList as $key => $val)
   {
       echo "<tr>";
       echo     "<td>".$key."</td>";
       echo     "<td>".$val."</td>";
       echo "</tr>";
   } 
   
   //do something here
   if($callback != NULL)
   {
   call_user_func_array($callback,$callbackParams);
   }
}

function printAverage($dataList)
{
    echo "<tr><td>Average</td>";
    echo "<td>".Average($dataList);
    echo "</td></tr>";   
}


function Options($dataList)
{
    foreach($dataList as $key => $val)
    {
         echo "<option value='"
            .$key."'>".$key."    (".$val." &euro;)</option>";                      
    }
}
function DropdownMenu($callback,$callbackParams)
{
     echo "<select>";
     //call a function the data
     call_user_func_array($callback, $callbackParams);
     echo "</select>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta namel="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Assoc Arrays</title>
    
<style>
     body
     {
         font-family: sans-serif;
         /*border: 1px solid #000;*/
         padding: 1rem;
         font-size: 16px;
     }
     .smartphonesTable
     {
         font-size: 1.5rem;
         width: 100%;
         border-collapse: collapse;
     }
     .smartphonesTable, .smartphonesTable th, .smartPhonesTable td
     {
         border: 1px solid orange;
         padding: .5rem;
      }
      
     .smartphonesTables td
     {
         height: 1rem;
         vertical-align: bottom;
     }
     select
     {
         width: 100%;
         padding: 1rem;
         margin: 1rem 0;
     }
     input
     {
         padding: 1rem;
         margin: 1rem 0;
         border: .2rem solid orange
     }
     input[type="text"]
     {
         width: 90%;
     }
     input[type="submit"]
     {
         background: orange;
         color: white;
         font-weight: bold;
     }
</style>
</head>
<body>
    <div>
        <h1>Dealing with Dynamic Table Associative Arrays</h1>
        <?php
           $tableHeaders = array("Smartphones","Prices");  
                     printTable("smartphonesTable","printKeyValTable", array($smartphones,$tableHeaders, "printAverage", array($smartphones)));     
           
           DropdownMenu("Options",array($smartphones));      
        echo "<p>Average phone price";
        echo " is:".Average($smartphones)."</p>";


        echo "Maria is Greek";
        ?>
        <form action="table.php" method="get">
           <input type="text" name="phone">
           <input type="submit" name="submit">
        </form>
    </div>
</body>
</html>
