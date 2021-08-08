<?php


class Boat
{
    public $size;
    private $name = "frank";
    private $family = "lampard";
    public $month;
    protected $city = "yazd";

    public function __construct($month)
    {
        $this->month = $month;
    }

    public function __destruct()
    {
        echo "I`m done";
    }

    public function __get(string $name)
    {
        return $this->{$name};
    }

    public function __set(string $name, $value): void
    {
        $this->{$name} = $value;
    }

    public function __call(string $name, array $arguments)
    {
        $this->$name($arguments[0]);
    }

    public static function __callStatic(string $name, array $arguments)
    {
        self::$name($arguments);
    }

    private function calc($number)
    {
        echo $number + 12;
    }

    private static function total($numbers)
    {
        echo $numbers[0] + $numbers[1];
    }

//    public function __sleep(): array
//    {
//        return ['name', 'family'];
//    }

//    public function __wakeup(): void
//    {
//        $this->month = "ord";
//        $this->size = 12;
//    }

    public function __serialize(): array
    {
        return [
            "name" => $this->name,
            "age" => 23
        ];
    }

    public function __unserialize(array $data): void
    {
        foreach ($data as $name => $value) {
            $this->{$name} = $value;
        }
    }

    public function __toString(): string
    {
        return json_encode($this);
    }

    public function __invoke()
    {
        return $this->__construct("ordi");
    }

    public static function __set_state(array $an_array): object
    {
        $obj = new Boat("ordi");
        $obj->name = "hasan";

        return $obj;
    }

    public function __clone(): void
    {
        $this->name = null;
        $this->month = null;
    }

    public function __debugInfo(): ?array
    {
        return [
            'color' => 'Yellow',
            'height' => 120,
            'name' => $this->name
        ];
    }
}

$obj = new Boat("ordi");
$obj->name = "zahra";

$obj->calc(10);
echo "<br>";
Boat::total(5, 8);

echo "<br>";

$export = var_export($obj, true);
eval('$newObj = ' . $export . ';');
print_r($newObj);

echo "<br>";

$cloned = clone($obj);
print_r($cloned);

echo "<br>";
var_dump($obj);