<?php
namespace PSpec;

require_once __DIR__ . '/Expectation.php';

class PSpec
{
    /** @type Expectation[] */
    private static $expectations = [];

    public static function describe($description, $callback)
    {
        echo "$description";
        call_user_func($callback);
    }

    public static function it($description, $callback)
    {
        echo " $description";
        call_user_func($callback);
        foreach (self::$expectations as $matcher) {
            if (!$matcher->validate()) {
                echo " failed :(\n";
                echo $matcher->getErrorMessage();
                return;
            }
        }
        echo " passed :)\n";
        self::$expectations = [];
    }

    public static function expect($actual)
    {
        $matcher              = new Expectation($actual);
        self::$expectations[] = $matcher;
        return $matcher;
    }
}
