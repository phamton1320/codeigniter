<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title ;?></title>
    <link rel="stylesheet" href="<?php echo base_url()?>styles/kendo.common.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>styles/kendo.default.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>styles/kendo.default.mobile.min.css" />
    <script src="<?php echo base_url()?>js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>js/kendo.all.min.js"></script>
</head>
<body>
    <div id="example">
    <div class="demo-section k-content">
        <?php echo validation_errors(); ?>
        <?php echo form_open('login/index');?>
        <form id="employeeForm" class="k-form k-form-vertical" data-role="validator" novalidate="novalidate">
            <ul class="k-form-group">
                <li class="k-form-field">
                    <label for="FirstName" class="k-form-label">User Name:</label>
                    <span class="k-form-field-wrap">
                        <input type="text" class="k-textbox" name="username" id="FirstName" required="required" />
                    </span>
                </li>
                <li class="k-form-field">
                    <label for="LastName" class="k-form-label">PassWord:</label>
                    <span class="k-form-field-wrap">
                        <input type="text" class="k-textbox" name="password" id="LastName" required="required" />
                    </span>
                </li>
                <li class="k-form-buttons">
                    <button type="submit" class="k-primary" data-role="button" name="submit_login" data-click="save">Login</button>
                </li>
            </ul>
        </form>
    </div>
</div>
<style>
</style>
<script type="text/javascript">
    $(function () {
        var container = $("#employeeForm");
        kendo.init(container);
        container.kendoValidator({
            rules: {
                greaterdate: function (input) {
                    if (input.is("[data-greaterdate-msg]") && input.val() != "") {
                        var date = kendo.parseDate(input.val()),
                            otherDate = kendo.parseDate($("[name='" + input.data("greaterdateField") + "']").val());
                        return otherDate == null || otherDate.getTime() < date.getTime();
                    }
                    return true;
                }
            }
        });
    });
    function save(e) {
        var validator = $("#employeeForm").data("kendoValidator");
        if (validator.validate()) {
            alert("Employee Saved");
        }
    }
</script>
</body>
</html>