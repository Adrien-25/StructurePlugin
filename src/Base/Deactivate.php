<?php
/**
 * @package MRLExample
 */

namespace Example\Base;

class Deactivate
{
    public static function deactivate(){
        flush_rewrite_rules();
    }
}
