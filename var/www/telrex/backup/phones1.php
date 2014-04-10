<!DOCTYPE html>
<html>
<head>

    <title>OSIS PBX</title>

    <link href="examples/content/shared/styles/examples-offline.css" rel="stylesheet">
    <link href="styles/kendo.common.min.css" rel="stylesheet">
    <link href="styles/kendo.default.min.css" rel="stylesheet">
    
    <script src="js/jquery.min.js"></script>
    <script src="js/kendo.web.min.js"></script>
    <script src="examples/content/shared/js/console.js"></script>
</head>
<body>
    <h3>OSIS PBX</h3>
    
 <?php include($_SERVER['DOCUMENT_ROOT']."/osispbx/includes/mainmenu.php"); ?>
    <!-- class="k-content"-->
<div id="example" class="k-content">
            <div id="grid"></div>

            <script>
                $(document).ready(function () {
                    var crudServiceBaseUrl = "http://demos.kendoui.com/service",
                        dataSource = new kendo.data.DataSource({
                            transport: {
                                read:  {
                                    url: crudServiceBaseUrl + "/Products",
                                    dataType: "jsonp"
                                },
                                update: {
                                    url: crudServiceBaseUrl + "/Products/Update",
                                    dataType: "jsonp"
                                },
                                destroy: {
                                    url: crudServiceBaseUrl + "/Products/Destroy",
                                    dataType: "jsonp"
                                },
                                create: {
                                    url: crudServiceBaseUrl + "/Products/Create",
                                    dataType: "jsonp"
                                },
                                parameterMap: function(options, operation) {
                                    if (operation !== "read" && options.models) {
                                        return {models: kendo.stringify(options.models)};
                                    }
                                }
                            },
                            batch: true,
                            pageSize: 30,
                            schema: {
                                model: {
                                    id: "ProductID",
                                    fields: {
                                        ProductID: { editable: false, nullable: true },
                                        ProductName: { validation: { required: true } },
                                        UnitPrice: { type: "number", validation: { required: true, min: 1} },
                                        Discontinued: { type: "boolean" },
                                        UnitsInStock: { type: "number", validation: { min: 0, required: true } }
                                    }
                                }
                            }
                        });

                    $("#grid").kendoGrid({
                        dataSource: dataSource,
                        pageable: true,
                        height: 400,
                        toolbar: ["create"],
                        columns: [
                            { field:"ProductName", title: "Product Name" },
                            { field: "UnitPrice", title:"Unit Price", format: "{0:c}", width: "150px" },
                            { field: "UnitsInStock", title:"Units In Stock", width: "150px" },
                            { field: "Discontinued", width: "100px" },
                            { command: ["edit", "destroy"], title: "&nbsp;", width: "210px" }],
                        editable: "popup"
                    });
                });
            </script>
        </div>

     
 <?php include($_SERVER['DOCUMENT_ROOT']."/osispbx/includes/footer.php"); ?>
    
    
</body>
</html>
