<?php
// Check the features of version 8 php

class Boat
{
//    public $name = "reza";

    public function __construct(public string $name, public string $family)
    {
//        $this->name = $name;
//        $this->family = $family;
    }

    public function color()
    {
        echo "color is red";
    }
}

//1) Null safe operator
$obj = new Boat("frank", "lampard");
echo $obj->name->foo->bar ?? 12; // Null coalescing
echo $obj?->color()?->foo()?->bar(); // Null coalescing(??) in hear has error. use Null safe operator (?->)


//2) str_contains // str_starts_with // str_ends_with
echo str_ends_with("frank go to the kitchen", "kitchen");

//3) Constructor property promotion
new Boat("frank", "lampard"); // define property class by arguments construct

//4) Named Arguments
//5) Union Types
function user($name , $email=null, $age=null, $gender=null, int|string $phoneNumber) {
    echo $name;
}

echo user(phoneNumber: "bb", name: "ali");

//6) Match Expression
$a = 3;
$message = '';

// with switch case
switch ($a)
{
    case 0:
    case 1:
        $message = null;
        break;
    case 2:
        $message = "not found";
        break;
    case 3:
        $message = "server error";
        break;
    default:
        $message = "unknown";
        break;
}

// with Match Expression replace switch case
$message = match($a) {
    0,1 => null,
    2 => "not found",
    3 => "server error",
    default => "unknown"
};


//7) static
class Watch
{
    public function hour(): static
    {
        return new static();
    }
}
$newObj = new Watch;
print_r($newObj->hour());