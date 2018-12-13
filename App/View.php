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
class View implements \Countable, \Iterator
{
    use GetSetMagic;


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
        return count($this->data) ;
    }

    public function current()
    {
        return current($this->data);
    }
    public function next()
    {
  //      echo 'NEXT' . '<br>';    Для отладки
        next($this->data);
    }
    public function key()
    {
        return key($this->data);
    }
    public function valid()
    {
        return null !== key($this->data);
    }
    public function rewind()
    {
        reset($this->data);
    }



    }

