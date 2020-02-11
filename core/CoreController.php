<?php 

class coreController {

    public $view, $model;

    public function render($view, $data = null) {
        extract($data);
        include_once ('app/view/'.$view.'.phtml');
    }

}