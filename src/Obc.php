<?php
/*
* Abdukodir Khojiyev
* Backend Developer
* Project: oc
* Date:  7/28/2024
*/

namespace Nafisphp\Obc;

use Nafisphp\Obc\Interfaces\ObcInterface;

class Obc implements ObcInterface
{

    /**
     * Starts output buffering.
     *
     * This method initiates output buffering and allows for an optional callback function
     * to process the buffer's contents. You can also specify the chunk size and flags for
     * more granular control over the buffering mechanism.
     *
     * @param  callable|null  $callback  A callable to process the buffer's contents when it is flushed. Default is null.
     * @param  int  $chunk_size  The size of each chunk of data in bytes. Default is 0, which means to use the default size.
     * @param  int  $flags  A bitmask of flags to control the output buffering behavior. Default is PHP_OUTPUT_HANDLER_STDFLAGS.
     *
     * @return void
     */
    public static function start($callback = null, $chunk_size = 0, $flags = PHP_OUTPUT_HANDLER_STDFLAGS)
    {
        ob_start($callback, $chunk_size, $flags);
    }

    /**
     * Flushes the output buffer.
     *
     * This method flushes (outputs) the contents of the output buffer to the browser.
     * It does not end the output buffering, allowing further content to be buffered.
     *
     * @return void
     */
    public static function flush()
    {
        ob_flush();
    }

    /**
     * Lists all active output handlers.
     *
     * This method returns an array of all active output handlers in use.
     * Each handler in the array represents a buffering level.
     *
     * @return array An array of active output handlers.
     */
    public static function list_handlers()
    {
        return ob_list_handlers();
    }

    /**
     * Gets the current output buffering level.
     *
     * This method returns the current nesting level of the output buffering mechanism.
     * Each call to ob_start() increments the level by one, and each call to ob_end_clean()
     * or ob_end_flush() decrements the level by one.
     *
     * @return int The current output buffering level.
     */
    public static function level()
    {
        return ob_get_level();
    }

    /**
     * Gets the status of the active output buffers.
     *
     * This method returns an array of associative arrays holding information about all active output buffers.
     * Each associative array contains the buffer's level, type, and status.
     *
     * @return array An array of associative arrays with information about each active output buffer.
     */
    public static function status()
    {
        return ob_get_status(true);
    }

    /**
     * Gets the length of the output buffer.
     *
     * This method returns the length in bytes of the contents in the topmost output buffer.
     * If no buffering is active, it returns false.
     *
     * @return int|false The length of the output buffer in bytes, or false if no buffering is active.
     */
    public static function length()
    {
        return ob_get_length();
    }

    /**
     * Gets the contents of the output buffer.
     *
     * This method returns the current contents of the output buffer without clearing it.
     * If no buffering is active, it returns false.
     *
     * @return string|false The contents of the output buffer, or false if no buffering is active.
     */
    public static function contents()
    {
        return ob_get_contents();
    }

    /**
     * Gets the contents of the output buffer and flushes it.
     *
     * This method returns the contents of the topmost output buffer and then flushes the buffer,
     * sending its contents to the browser. The buffer is then closed.
     * If no buffering is active, it returns false.
     *
     * @return string|false The contents of the output buffer, or false if no buffering is active.
     */
    public static function get_flush()
    {
        return ob_get_flush();
    }

    /**
     * Flushes and ends the output buffer.
     *
     * This method flushes (outputs) the contents of the topmost output buffer and then closes it.
     * If there is no active output buffer, it returns false.
     *
     * @return void True on success, or false if no buffering is active.
     */
    public static function end_flush()
    {
        ob_end_flush();
    }

    /**
     * Cleans (discards) and ends the output buffer.
     *
     * This method discards the contents of the topmost output buffer and then closes it.
     * If there is no active output buffer, it returns false.
     *
     * @return void True on success, or false if no buffering is active.
     */
    public static function end_clean()
    {
        ob_end_clean();
    }

    /**
     * Cleans (discards) the output buffer.
     *
     * This method discards the contents of the topmost output buffer without closing it.
     * If there is no active output buffer, it returns false.
     *
     * @return void True on success, or false if no buffering is active.
     */
    public static function clean()
    {
        ob_clean();
    }

    /**
     * Toggles implicit flush.
     *
     * This method enables or disables implicit flushing. When enabled, PHP will automatically
     * flush the output buffer after every output call.
     *
     * @param  bool  $flag  If true, implicit flushing is turned on. If false, it is turned off. Default is true.
     *
     * @return void
     */
    public static function implicit_flush($flag = true)
    {
        ob_implicit_flush($flag);
    }

    /**
     * Output handler for gzip compression.
     *
     * This method is a callback function for output buffering that compresses the buffer
     * contents using gzip compression. It can be used with ob_start() to automatically
     * compress output.
     *
     * @param  string  $buffer  The contents of the output buffer.
     * @param  int  $mode  The mode of the output handler. It can be PHP_OUTPUT_HANDLER_START, PHP_OUTPUT_HANDLER_CONT, or PHP_OUTPUT_HANDLER_END.
     *
     * @return string|false The compressed buffer contents, or false if an error occurs.
     */
    public static function gzhandler($buffer, $mode)
    {
        return ob_gzhandler($buffer, $mode);
    }

    /**
     * Wraps the output buffer contents with a callback function.
     *
     * This method retrieves the current output buffer contents, cleans the buffer,
     * and then applies the provided callback function to the contents.
     * The processed contents are then echoed.
     *
     * @param  callable|null  $callback  A callable to process the buffer's contents. If no callback is provided, nothing happens.
     *
     * @return void
     */
    public static function wrap($callback = null)
    {
        if ($callback) {
            $output = self::get_clean();
            echo $callback($output);
        }
    }

    /**
     * Gets the contents of the output buffer and cleans it.
     *
     * This method returns the contents of the topmost output buffer and then cleans (erases) the buffer.
     * If no buffering is active, it returns false.
     *
     * @return string|false The contents of the output buffer, or false if no buffering is active.
     */
    public static function get_clean()
    {
        return ob_get_clean();
    }
}
