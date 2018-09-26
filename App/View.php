<?php
/**
 * @author Alex Smolin alex@mail.ru
 */


namespace App;


/**
 * Class View
 * @package App
 *
 * @property array $articles
 */
class View implements \Countable, \ArrayAccess
{

    use GetSetMagic;

    /**
     * @var array сохраняет данные
     */
    protected $data = [];

    /**
     * @param $template  шаблон
     */

    public function display($template)
    {
        echo $this->render($template);
    }


    /**
     * Сохраняет выходные данные в буфере
     * @param $template
     * @return string
     */
    public function render($template)
    {

        ob_start();
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;

    }

    public function count()
    {
        return count($this->data);
    }

    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->data[$offset] ?? null;
    }

    public function offsetSet($offset, $value)
    {
        $this->data[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }

    }

