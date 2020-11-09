<!DOCTYPE html>  
<html>

<head>
<title>Registration form</title>
</head>
 
<body>
    <?php echo validation_errors(); ?>

    <?php echo form_open('usercontroller/saveuser'); ?>
	<form method="post">
		<table width="600" border="1" cellspacing="5" cellpadding="5">
            <tr>
                <td width="230">UserName </td>
                <td width="329"><input type="text" name="username"/></td>
            </tr>
            <tr>
                <td>PassWord </td>
                <td><input type="text" name="password"/></td>
            </tr>
            <tr>
                <td>Level</td>
                <td><input type="text" name="level"/></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="save" value="Save Data"/></td>
            </tr>
        </table>
	</form>
</body>
</html>