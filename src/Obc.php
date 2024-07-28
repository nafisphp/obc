<?php
/*
* Abdukodir Khojiyev
* Backend Developer
* Project: oc
* Date:  7/28/2024
*/

namespace Nafisphp\Oc;

use Nafisphp\Oc\Interfaces\ObcInterface;

class Obc implements ObcInterface
{

    public static function start($callback = null, $chunk_size = 0, $flags = PHP_OUTPUT_HANDLER_STDFLAGS)
    {
        ob_start($callback, $chunk_size, $flags);
    }

    public static function flush()
    {
        // TODO: Implement flush() method.
    }

    public static function list_handlers()
    {
        // TODO: Implement list_handlers() method.
    }

    public static function level()
    {
        // TODO: Implement level() method.
    }

    public static function status()
    {
        // TODO: Implement status() method.
    }

    public static function length()
    {
        // TODO: Implement length() method.
    }

    public static function contents()
    {
        return ob_get_contents();
    }

    public static function get_clean()
    {
        // TODO: Implement get_clean() method.
    }

    public static function get_flush()
    {
        // TODO: Implement get_flush() method.
    }

    public static function end_flush()
    {
        // TODO: Implement end_flush() method.
    }

    public static function end_clean()
    {
        // TODO: Implement end_clean() method.
    }

    public static function clean()
    {
        // TODO: Implement clean() method.
    }

    public static function implicit_flush()
    {
        // TODO: Implement implicit_flush() method.
    }

    public static function gzhandler()
    {
        // TODO: Implement gzhandler() method.
    }

    public static function _add_rewrite_var()
    {
        // TODO: Implement _add_rewrite_var() method.
    }

    public static function reset_rewrite_vars()
    {
        // TODO: Implement reset_rewrite_vars() method.
    }

    public static function wrap()
    {
        // TODO: Implement wrap() method.
    }
}
