<?php
class UserController extends BaseController {

    public function __construct()
    {
        $this->loadModel('UserModel');
    }

    public function list(){

        //Get data from DB
        $lst_user = [];
        $data_json = json_encode($lst_user);
        $data=['lst_user' => $lst_user,
            'data_json' => $data_json
        ];
        //
        return $this->view('Frontend.User.List',$data);
    }

    public function login(){
        
        //ViewからLoginIDとPasswordを取得する 
        $loginID = $_POST['loginID']??'';
        $pass = $_POST['pass']??'';
        print_r($_POST);
        if(empty($loginID) || empty($pass)){
            
        }

        $user = new UserModel;

        $dtUsers = $user->getAll('UserID,UserName,LoginID',array('columns'=>'UserID','type'=>'asc'),15);

        $data=array('dataUsers'=>$dtUsers);
        return $this->view('Frontend.User.Login',$data);
    }

    public function nintei(){

        //Get data from DB
        $dt_user = [];
        $data=['dt_user' => $dt_user,
        ];
        //
        return $this->view('Frontend.User.Nintei',$data);
    }

}
?>