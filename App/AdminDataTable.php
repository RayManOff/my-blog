<?php

namespace App;


class AdminDataTable
{
    protected $models = [];
    protected $functions = [];


    public function __construct($models = [], $functions = [])
    {
        $this->models = $models;
        $this->functions = $functions;
    }

    public function render($template = '')
    {
        ob_start();
        $table = '<table class="table table-hover">';
        foreach ($this->models as $model) {
            $table .= "<tr>";
            foreach ($this->functions as $function) {
                $table .= sprintf("<td>%s</td>", $function($model));
            }
            $table .= "</tr>";
        }
        $table .= '</table>';

        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        echo $content;
    }

}