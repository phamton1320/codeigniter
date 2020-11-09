<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="../styles/kendo.common.min.css" />
    <link rel="stylesheet" href="../styles/kendo.default.min.css" />
    <link rel="stylesheet" href="../styles/kendo.default.mobile.min.css" />
    <script src="../js/jquery.min.js"></script>
    <script src="../js/kendo.all.min.js"></script>
</head>

<body>
    <?php
        if($_SESSION['username']){
            echo '
            <script>
                alert("Xin chao");
            </script>';
        }
    ?>
    <div id="example">
    <div id="grid"></div>

    <script>
        $(document).ready(function () {
            var crudServiceBaseUrl = 'http://localhost/codeigniter/usercontroller',
                
                dataSource = new kendo.data.DataSource({
                    transport: {
                        read:  {
                            url: crudServiceBaseUrl+"/index1",
                            contentType: "application/json; charset=utf-8",
                            dataType: 'json',
                            type: "POST",
                        },
                        update: {
                            url: crudServiceBaseUrl + "/EditUser",
                            contentType: "application/json; charset=utf-8",
                            dataType: "json",
                            type: "POST",
                            complete:function(e){
                                $("#grid").data("kendoGrid").dataSource.read();
                            }
                        },
                        destroy: {
                            url: crudServiceBaseUrl + "/Destroy",
                           // contentType: "application/json; charset=utf-8",
                            //dataType: "application/json",
                            type: "POST",
                        },
                        create: {
                            url: crudServiceBaseUrl + "/addUser",
                            contentType: "application/json; charset=utf-8",
                            dataType: 'json',
                            type: "POST",
                            complete:function(e){
                                $("#grid").data("kendoGrid").dataSource.read();
                            }
                        },
                        parameterMap: function(options, operation) {
                            if (operation !== "read" && options.models) {
                                //return {models: kendo.stringify(options.models)};
                                console.log(kendo.stringify(options.models));
                                return kendo.stringify(options.models);
                            }
                        }
                    },
                    editable: true,
                    batch: true,
                    pageSize: 20,
                    schema: {
                        model: {
                            id: "id",
                            fields: {
                                id: { editable: false, nullable: true },
                                username: { validation: { required: true } },
                                password: { validation: { required: true } },
                                level: { validation: { required: true } },
                            }
                        }
                    }
                });

            $("#grid").kendoGrid({
                dataSource: dataSource,
                pageable: true,
                height: 550,
                toolbar: ["create"],
                columns: [
                    { field: "username", title: "User Name" },
                    { field: "password", title:"Pass Word", width: "120px" },
                    { field: "level",title:"Level", width: "120px" },
                    { command: ["edit", "destroy"], title: "&nbsp;", width: "250px" }],
                editable: "popup"
            });
        });

        function customBoolEditor(container, options) {
            $('<input class="k-checkbox" type="checkbox" name="Discontinued" data-type="boolean" data-bind="checked:Discontinued">').appendTo(container);
        }
    </script>
</div>
</body>
</html>
