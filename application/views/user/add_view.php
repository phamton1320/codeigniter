
<?php echo form_open('user/add'); ?>
<form action="<?php //echo base_url()."user/add"; ?>" method="post" id="categories">
        <?php
        echo "<div class='mess_error'>";
        echo "<ul>";
            if(validation_errors() != ''){
                echo "<li>".validation_errors()."</li>";
            }
        echo "</ul>";
        echo "</div>";
        ?>
    <fieldset class="show">
        <legend align="center">Username Infomations</legend>
        <div align="center">
        <label>Username:</label><input type="text" name="username" size="28" class="input"/><br/>
        <label>Email:</label><input type="text" name="email" size="28" class="input"/><br/>
        <label>Password:</label><input type="password" name="password" size="28" class="input"/><br/>
        <label>Re-Pass:</label><input type="password" name="password2" size="28" class="input"/><br />
        <label>Level:</label><select name="level">
            <option value="1" selected>Member</option>
            <option value="2" >Administrator</option>
        </select></br />
        <label>&nbsp;</label><input type="submit" name="ok" value="Add User" class="btn" />
        </div>
    </fieldset>
 
</form>