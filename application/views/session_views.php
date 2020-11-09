<!DOCTYPE html>
<html>
    <head>
        <!-- dữ liệu $title và $message từ controller truyền qua view này! -->
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <p></p>
        <form method="POST" action="">
            Username : <input type="text" name="username" value="<?php echo $this->session->userdata("username")?>"/> <br/>
            Password : <input type="password" name="password" value=""/> <br/>
            <input type="submit" name="submit_login" value="Login"/>
        </form>
    </body>
</html>