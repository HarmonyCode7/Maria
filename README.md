# Employees Salaries 
Read the comments in the code to understand how tht e functions work
In particular read ArraysAssoc($arraysAssoc, $getThis, $where), this function will take array of arrays that are associative and 
get the value of a particular key where the value of the key matches with the value of the parameter $where.

$getThis the key whose value you want to get.
%where acts like an id identifying with a particular key

Example 
You want to get the salary of an employee , $where  = "employee" and %getThis is "salary"
So every array key of value "employee" will have its salary retrieved
