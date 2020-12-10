<?php
class UserModel extends BaseModel{
    const TABLE = 'TestUser';

    public function getAll($select, $orderBys, $limit)
    {
        $data = $this->all(self::TABLE,$select, $orderBys, $limit);
        return $data;
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
}
?>