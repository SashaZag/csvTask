<?php 

class mainController extends CoreController 
{

    public function showAction() 
    {
        $this->model = new mainModel;
        $data = $this->model->getData();

        //display data or message about empty db
        if($data) {
            $this->render('all', ['data' => $data]);
        } else {
            $data = [];
            $this->render('notice', ['mess' => 'No records']);
        }

    }

}

?>