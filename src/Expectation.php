<?php
namespace PSpec;

/**
 * Class Expectation
 *
 * @package PSpec
 */
class Expectation
{
    private $actual;
    private $expected;

    public function __construct($actual)
    {
        $this->actual = $actual;
    }

    public function toBe($expected)
    {
        $this->expected = $expected;
    }

    public function validate()
    {
        return $this->expected == $this->actual;
    }

    public function getErrorMessage()
    {
        return "Expected '" . $this->expected . "' to match the '" . $this->actual . "'\n";
    }
}
