<?php
class UserModel extends BaseModel{
    const TABLE = 'TestUser';

    public function getAll($select = "*")
    {
        $dtUser = array();
        $sql = "SELECT * FROM ".self::TABLE.";";
        $pre = $this->conn->prepare($sql);
        $result = $pre->execute();
        if(false !== $result){
            $dtUser = $pre->fetchAll(PDO::FETCH_ASSOC);
        }
        return $dtUser;
    }

    /**
     * ログインIDによるユーザの情報を取得する
     *
     * @param [string] $loginID
     * @return void
     */
    public function findByLogId($loginID)
    {
        $user = array();
        $sql = "SELECT * FROM ".self::TABLE." WHERE LoginID = :LoginID";
        $pre = $this->conn->prepare($sql);

        $pre->bindValue(":LoginID",$loginID,PDO::PARAM_STR);
        $r = $pre->execute();

        if(false !== $r){
            $data = $pre->fetchAll(PDO::FETCH_ASSOC);
            if(1 === count($data)){
                $user = $data[0];
            }
        }else{
            echo('システムに誤りがある');
        }

        return $user;
    }

    /**
     * ログインIDによるユーザの情報を取得する
     *
     * @param [string] $loginID
     * @return void
     */
    public function findByUserId($userID)
    {
        $user = array();
        $sql = "SELECT * FROM ".self::TABLE." WHERE UserID = :UserID";
        $pre = $this->conn->prepare($sql);

        $pre->bindValue(":UserID",$userID,PDO::PARAM_INT);
        $r = $pre->execute();

        if(false !== $r){
            $data = $pre->fetchAll(PDO::FETCH_ASSOC);
            if(1 === count($data)){
                $user = $data[0];
            }
        }else{
            echo('システムに誤りがある');
        }

        return $user;
    }

    public function update($dtUser)
    {
        $sql = 'UPDATE TestUser 
                SET UserName=:UserName,
                    LoginID=:LoginID,
                    LoginPW=:LoginPW 
                WHERE UserID=:UserID';

        $pre = $this->conn->prepare($sql);

        $pre->bindValue(':UserID',$dtUser['UserID'],PDO::PARAM_INT);
        $pre->bindValue(':UserName',$dtUser['UserName'],PDO::PARAM_STR);
        $pre->bindValue(':LoginID',$dtUser['LoginID'],PDO::PARAM_STR);
        
        $pre->bindValue(':LoginPW',htmlspecialchars($dtUser['LoginPW'], ENT_QUOTES, 'UTF-8'),PDO::PARAM_STR);

        $result = $pre->execute();

        return $result;
        
    }
}
?>