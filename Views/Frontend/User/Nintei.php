<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>認定</title>
    <link rel="stylesheet" type="text/css" href="./Public/CSS/Frontend/Nintei.css"/>
</head>
<body>
    <div class="container">
        <form class="form" action="?controller=user&action=nintei" method="post">
            <div class="row">
                <label class="row-label">ID:</label>
                <input name="user_id" class="row-input input-id" type="text" readonly <?php echo("value='{$user['UserID']}'")?>/>
            </div>
            <div class="row">
                <label class="row-label">名前:</label>
                <input name="user_name" class="row-input" type="text"<?php echo("value='{$user['UserName']}'")?>/>
            </div>
            <div class="row">
                <label class="row-label">ログインID:</label>
                <input name="login_id" class="row-input" type="text" <?php echo("value='{$user['LoginID']}'")?>/>
            </div>
            <div class="row">
                <label class="row-label">ログインパスワード:</label>
                <input name="login_pass" class="row-input" type="password" <?php echo("value='{$user['LoginPW']}'")?>/>
            </div>

            <div class="row-button">
                <button type="submit" class="btn-nintei" name="nintei" value="submit">認定</button>
                <button type="submit" class="btn-nintei" name="cancel" value="cancel" >キャンセル</button>
            </div>
        </form>
    </div>
</body>
</html>

<script type="text/javascript">
    
</script>