<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test User</title>
    <link rel="stylesheet" type="text/css" href="./public/css/site/index.css"/>
</head>
<body>
    <div class="container">
        <form name="form_main" class="side-left" method="post" action="">
            <table id="table" class="table-main">
                <thead>
                    <th>UserID</th>
                    <th>UserName</th>
                    <th>LoginID</th>
                </thead>
                <tbody>
                    <?php foreach($lst_user as $key=>$row) :?>
                    <tr <?php echo("id='tr_{$row['UserID']}'"); 
                        echo(" onclick='display({$row['UserID']},{$data_json})'");
                        if($key===0) echo("class = 'selected'");
                        ?>>
                        <td><?php echo($row["UserID"])?></td>
                        <td><?php echo($row["UserName"])?></td>
                        <td><?php echo($row["LoginID"])?></td>
                        <td hidden><input type="radio" name="r_user" <?php echo("value='{$row['UserID']}'"); 
                            echo("id='rd_{$row['UserID']}'"); 
                            if($key===0) echo("checked = 'true'");?>/>
                        </td>
                    </tr>
                    <?php endforeach?>    
                </tbody>
            </table>
        </form>
        <div class="side-right">
            <div class="side-up">
                <button class="btn-common btn-login" onclick="login()"  >ログイン</button>
            </div>
            <div class="side-down">
                <button class="btn-common btn-nintei" onclick="nintei()" >認定</button>
            </div>
        </div>
    </div>
</body>
</html>

<script>
  function display(id,data){
    if(typeof data !== 'undefined' && data.length > 0){
        data.forEach(row => {
            document.getElementById("tr_"+row['UserID']).classList.remove("selected");  
        });
        
    }
    document.getElementById("tr_"+id).setAttribute("class","selected");
    document.getElementById("rd_"+id).checked = true;
  }

  /**
   * Submit form login
   *
   * @return void
   */
  function login(){
    document.form_main.setAttribute("action","?controller=user&action=login");
    document.form_main.submit();
  }

  /**
   * submit form nintei
   *
   * @return void
   */
  function nintei(){
    document.form_main.setAttribute("action","./site/view/nintei.php");
    document.form_main.submit();
    }
</script>