<?php
class BaseController{

    const VIEWS_FOLDER_NAME = 'Views';
    const MODELS_FOLDER_NAME = 'Models';

    /**
     * Load view in folder Views
     * $pathView: foldername.viewname
     *
     * @param string $pathView
     * @param array $data
     * @return view
     */
    protected function view($viewPath,array $data = [])
    {   
        //Get data from Models
        foreach($data as $key=>$value){
            $$key = $value;
        }

        //get path view
        $viewPath = self::VIEWS_FOLDER_NAME.'/'.str_replace('.','/',$viewPath).'.php';
        return require($viewPath);
    }


     protected function loadModel($modelPath)
    {
        $modelPath = self::MODELS_FOLDER_NAME.'/'.$modelPath.'.php';
        return require($modelPath);
    }
}
?>