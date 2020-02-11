<?php 

class uploadController extends coreController 
{

    protected $path;
    protected $format = ['UID', 'Name', 'Age', 'Email', 'Phone', 'Gender'];

    public function formAction()
    {
        $this->render('uploadCsv');
    }

    public function saveAction()
    {
        //check if size < 1MB
        if($_FILES['csv']['size'] > 1024) 
        {
            $this->render('error', ['mess' => 'File is too large']);
        }


        $fileName = $_FILES['csv']['name'];
        $fileTempName = $_FILES['csv']['tmp_name'];
        $this->path = 'app/upload/' . $fileName;
        //save file to filesystem
        if (!move_uploaded_file($fileTempName, $this->path)) 
        {
            $this->render('error', ['mess' => 'An error acquired while uploading file']);
        }
        //upload records to db
        $this->handle();

    }

    public function handle() 
    {

        $file = fopen($this->path, "r");
        $fields = fgetcsv($file, 1000, ",");

        //check for format
        if(!empty(array_diff($arr, $this->format))) 
        {
            $this->render('notice', ['mess' => 'Unsupported file format']);
        }

        $users = [];
        while(($data = fgetcsv($file, 1000, ',')) !== false) 
        {
            array_push($users, $data);
        }
        $this->model = new uploadModel;

        if (!$this->model->upload($users)) 
        {
            $this->render('error', ['mess' => 'An error acquired while saving records to the database']);
        }
    }


}