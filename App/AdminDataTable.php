<?php


namespace App;


class AdminDataTable
{
    protected $functions = [];
    protected $models = [];

    public function __construct(array $models,array $functions)
    {
        $this->models = $models;
        $this->functions = $functions;
    }

    public function render()
    {
        $table = '';
        foreach ($this->models as $model) {
            $table .= '<tr>';
            foreach ($this->functions as $function) {
                $table .= '<td>' . $function($model) . '</td>';
            }
            $table .= '</tr>';
        }
        return $table;

    }

}