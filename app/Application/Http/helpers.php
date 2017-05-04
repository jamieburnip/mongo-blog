<?php

/**
 * @param $fullFilePath
 *
 * @return string
 */
function cdn($fullFilePath): string
{
    return "//cdn.jamieburnip.co.uk/{$fullFilePath}";
}