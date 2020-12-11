<?php
class UserController extends BaseController {

    public function __construct()
    {
        $this->loadModel('UserModel');
    }

    /**
     * 全てのユーザを取得する。
     * Viewにデータを送信する
     *
     * @return View
     */
    public function list(){

        //Get data from DB
        $userModel = new UserModel;

        $lstUser = $userModel->getAll("UserID,UserName,LoginID");
        if(count($lstUser) < 1){
            echo ("<h1>ユーザの一覧を探さない！</h1>");
            exit();
        }
        $dtJson = json_encode($lstUser);
        $data=['lstUser' => $lstUser,
            'dtJson' => $dtJson
        ];
        //
        return $this->view('Frontend.User.List',$data);
    }

    /**
     * Login処理
     *
     * @return View
     */
    public function login(){
        
        $loginID = "";
        $userModel = new UserModel;
       
        //Viewからでーたを取得する 
        if(isset($_POST['r_user'])){
            //「List」画面から
            $userID = $_POST['r_user']??'';;
            $user = $userModel->findByUserId($userID);
            if(empty($user)){
                $this->showMsg('ユーザは存在しない','err');
                exit();
            }
           
            $loginID = $user['LoginID'];
            $data ["loginID"]=$loginID;
            return $this->view('Frontend.User.Login',$data);
        }else if(isset($_POST['id']) && isset($_POST['pass'])){
            //「Login」画面から
            $loginID = $_POST['id'];
            $pass = $_POST['pass'];

            if(empty($loginID) || empty($pass)){
                $this->showMsg('ユーザIDまたはパスワードは未定義です','err');
                exit();
            }
            $user = $userModel->findByLogId($loginID);
            if(empty($user)){
                $this->showMsg('ユーザは存在しない','err');
                exit();
            }

            if(true !== password_verify($pass,$user["LoginPW"])){
                $this->showMsg('ログインできません！','err');
                exit();
            }

            $this->showMsg('ログインできた。','info');
        }
        
    }


    public function nintei(){

        $userModel = new UserModel;
        //Viewからでーたを取得する 
        if(isset($_POST['r_user'])){
            //「List」画面から
            $userID = $_POST['r_user']??'';;
            $user = $userModel->findByUserId($userID);
            if(empty($user)){
                $this->showMsg('ユーザは存在しない','err');
                exit();
            }
            $data ["user"]=$user;
            return $this->view('Frontend.User.Nintei',$data);
        }else if(isset($_POST['nintei'])){
            $dtUser = [];
            $dtUser['UserID'] = $_POST['user_id'];
            $dtUser['UserName'] = $_POST['user_name'];
            $dtUser['LoginID'] = $_POST['login_id'];
            $dtUser['LoginPW']  = $_POST['login_pass'];

            $user = $userModel->findByUserId($dtUser['UserID']);

            //パスワードを暗号化
            if(($user['LoginPW'] !== $dtUser['LoginPW']) && (true !== empty($dtUser['LoginPW']))){
                $hash_pass = password_hash($dtUser['LoginPW'],PASSWORD_BCRYPT,['cost'=>12]);
                $dtUser['LoginPW'] = $hash_pass;
            }
            
            $result = $userModel->update($dtUser);
            if(true !== $result){
                $this->showMsg('システムに誤りがある','err');
                exit();
            }

            $this->showMsg("認定できました！",'info');
            exit();
            
        }else if(isset($_POST['cancel'])){
            header("Location: ./");
        }
        
    }

    private function showMsg($msg,$type="info")
    {
        if('info' === $type){
            echo("<h1>{$msg}</h1>");
        }else if('err' === $type){
            echo("<h1 style='color:red'>{$msg}</h1>");
        }

        echo("<a href='./'>ユーザ一覧画面へ戻る</a>");

    }

   
}
?>