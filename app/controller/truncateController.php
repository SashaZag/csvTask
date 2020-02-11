<?php

class truncateController extends CoreController 
{
    public function deleteAction() {

        $this->model = new truncateModel;
        if($this->model->truncate()) 
        {
            $this->render('notice', ['mess' => 'Table successfuly truncated']);
        } 
        else 
        {
            $this->render('notice', ['mess' => 'Failed to truncate table']);
        }
    }
}

?>