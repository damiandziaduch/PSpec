<?php

function describe($description, $callback)
{
    \PSpec\PSpec::describe($description, $callback);
}

function it($definition, $callback)
{
    \PSpec\PSpec::it($definition, $callback);
}

function expect($actual)
{
    return \PSpec\PSpec::expect($actual);
}


