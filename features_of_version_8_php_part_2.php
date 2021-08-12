<?php
// Check the features of version 8 php in part 2

//1) mixed type
function calc(mixed $arg): mixed
{
    return "Received and return any type parameter with mixed such as array, null, int, bool, string,...";
}

echo calc(2);

//2) get name class
class Car
{
    public string $name = "benz";
}

$obj = new Car;
echo get_class($obj);
echo $obj::class;

//3) try catch (catch without variable)
try {
    echo "try code";
} catch (Exception) {
    echo "this is catch without variable";
}

//4) error last cama(,) in define function arguments
function Jump($id, $name, $age,){}