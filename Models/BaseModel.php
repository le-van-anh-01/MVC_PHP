<?php
class BaseModel extends Database
{
    protected $conn;
    /**
     * 構築
     */
    public function __construct()
    {
        $this->conn = $this->connect();
    }

    // /**
    //  * 全てのユーザを取得する
    //  *
    //  * @param string $table
    //  * @param array $select
    //  * @param array $orderBys
    //  * @param integer $limit
    //  * @return array
    //  */
    // public function all($table, $columns='*', $orderBys=[], $limit = 100)
    // {
    //     $data = null;
    //     $sql = "";
    //     $orderByStr = implode(' ',$orderBys);

    //     if(false === empty($orderByStr)){
    //         $sql = "SELECT {$columns} FROM {$table} ORDER BY {$orderByStr}";
    //     }else{
    //         $sql = "SELECT {$columns} FROM {$table}";
    //     }
    //     $pre = $this->conn->prepare($sql);

    //     $r = $pre->execute();

    //     if(true === $r){
    //         $data = $pre->fetchAll(PDO::FETCH_ASSOC);
    //     }

    //     return $data;
    // }

    // public function find($id)
    // {
    //     # code...   
    // }

    // public function store()
    // {
    //     # code...
    // }
    
    // public function update()
    // {
    //     # code...
    // }

    // public function delete()
    // {
    //     # code...
    // }
}
?>