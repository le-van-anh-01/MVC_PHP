<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" type="text/css" href="./Public/CSS/Frontend/Login.css"/>
</head>
<body>
    <div class="container">
        <form class="form-login" action="?controller=user&action=login" method="POST">
            <div class="row-form">
                <label class="lable-row">User ID:</label>
                <input class="input-row" name="id" type="text" placeholder="ユーザIDを入力してください"/>
            </div>
            <div class="row-form">
                <label class="lable-row">Password:</label>
                <input class="input-row" name="pass" type="password" placeholder="パスワードを入力してください"/>
            </div>
            <div class="foot">
                <button class="btn-login" type="submit" name="btnLogin" value="submit">ログイン</button>
            </div>
        </form>

    </div>
</body>
</html>