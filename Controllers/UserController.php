<?php
class UserController extends BaseController {

    public function __construct()
    {
        $this->loadModel('UserModel');
    }

    public function index(){

        $userInfo = array('name'=> 'ichiro', 'pass'=>'12344');
        return $this->view('frontend.user.index',$userInfo);
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

    public function show()
    {
        echo __METHOD__;
    }
}
?>