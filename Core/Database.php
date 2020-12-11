<?php
class Database{
    // CONST DB_HOST='mysql:host=localhost;dbname=Nbs;charset=utf8';
    // CONST DB_USER='root';
    // CONST DB_PASS='';   
    CONST DB_HOST='sqlsrv:server=tcp:morien.cvgu3oaemfik.ap-northeast-1.rds.amazonaws.com;Database=Nbs';
    CONST DB_USER='StageUser';
    CONST DB_PASS='morien-akiyama';

    /**
     * データベースに接続する
     *
     * @return PDO
     */
    public function connect()
    {
        $connect = null;
        // 接続オプションの設定
        $opt = array (
            PDO::ATTR_EMULATE_PREPARES => false,
        );

        // 「複文禁止」が可能なら付け足しておく
        if (defined('PDO::MYSQL_ATTR_MULTI_STATEMENTS')) {
            $opt[PDO::MYSQL_ATTR_MULTI_STATEMENTS] = false;
        }
        // 接続
        try {
            $connect = new PDO(self::DB_HOST, self::DB_USER, self::DB_PASS, $opt);
            
        } catch (PDOException $e) {
            // エラーは、以下に入っている
            echo $e->getMessage();
            exit();
        }

        return $connect;
    }

}


?>