<?php


namespace App\Models;

/**
 * Class View
 * @package App\Models
 *
 * @property array $articles
 */
class View implements \Countable, \ArrayAccess
{

    use GetSetMagic;

    /**
     * @var array сохраняет данные
     */
    protected $data = array();

    /**
     * @param $template  шаблон
     */

    public function display($template)
    {
        echo $this->render($template);
    }

  /*  public function __get($name)
    {
        return $this->data[$name] ?? null;

    }

    public function __set($name,$value)
    {
        $this->data[$name]  = $value;
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }
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

