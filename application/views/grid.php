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
<div id="example">
    <div id="grid"></div>
    <div id="details"></div>
    
    <script>
        var wnd,
            detailsTemplate;
        $(document).ready(function () {
            $("#grid").kendoGrid({
                dataSource: {
                    transport: {
                        read: {
                            url: "<?=base_url()?>usercontroller/index1",
                            contentType: "application/json; charset=utf-8",
                            dataType: 'json',
                            type: "POST",
                        },
                        destroy: {
                            url: "<?=base_url()?>usercontroller/Destroy",
                            dataType: "json",
                        },
                        create: {
                            url: "<?=base_url()?>usercontroller/index5",
                            dataType: "json"
                        },
                        parameterMap: function (options, operation) {
                           
                            return JSON.stringify(options);
                        }
                    },
                pageSize: 20
                },
                batch: true,

                height: 550,
                groupable: true,
                sortable: true,
               
                pageable: {
                    refresh: true,
                    pageSizes: true,
                    buttonCount: 5
                },
                columns: [{
                    field: "username",
                    title: "Contact Name",
                    width: 240
                }, {
                    field: "password",
                    title: "Contact Title"
                }, {
                    field: "level",
                    title: "Company Name"
                },
                {
                    command: { text: "View Details", click: showDetails }, 
                    title: "View Details", 
                    width: "180px" 
                },
                {
                    command: ["edit", "destroy"], title: "Action", width: "250px"
                },
                ],

            editable: "popup", // cho phep edit destroy

            }).data("kendoGrid");

             wnd = $("#details")
                .kendoWindow({
                    title: "Customer Details",
                    modal: true,
                    visible: false,
                    resizable: false,
                    width: 300
                }).data("kendoWindow");

            detailsTemplate = kendo.template($("#template").html());


            
        });

        

        
        


        function showDetails(e) {
            e.preventDefault();

            var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
            console.log(dataItem);
            wnd.content(detailsTemplate(dataItem));
            wnd.center().open();
            
        }

        
    </script>

    <script type="text/x-kendo-template" id="template">
        <div id="details-container">
            <h2>#= username #</h2>
            <em>#= password #</em>
            <dl>
                <dt>Level: #= password #</dt>
            </dl>
        </div>
    </script>
</div>

<style type="text/css">
    .customer-photo {
        display: inline-block;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background-size: 32px 35px;
        background-position: center center;
        vertical-align: middle;
        line-height: 32px;
        box-shadow: inset 0 0 1px #999, inset 0 0 10px rgba(0,0,0,.2);
        margin-left: 5px;
    }

    .customer-name {
        display: inline-block;
        vertical-align: middle;
        line-height: 32px;
        padding-left: 3px;
    }
</style>

</body>
</html>