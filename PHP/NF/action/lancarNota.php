<?php 
    include_once '../class/conexao.php';
    include_once '../class/invoice.php';
    include_once '../class/item.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lancar Nota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../jquery-easyui-1.10.4/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="../jquery-easyui-1.10.4/themes/icon.css">
	<script type="text/javascript" src="../jquery-easyui-1.10.4/jquery.min.js"></script>
	<script type="text/javascript" src="../jquery-easyui-1.10.4/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="../../source/jquery.validatebox.js"></script>
	<script type="text/javascript" src="../../source/jquery.textbox.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <script>
		function submitForm(){
			$('#ff').form('submit');
		}
		function clearForm(){
			$('#ff').form('clear');
		}
		function err(target, message){
			var t = $(target);
			if (t.hasClass('textbox-text')){
				t = t.parent();
			}
			var m = t.next('.error-message');
			if (!m.length){
				m = $('<div class="error-message"></div>').insertAfter(t);
			}
			m.html(message);
		}
        function showFornecedor(str) {
            if (str == "") {
                document.getElementById("fornecedor").innerHTML = "";
                return;
            } else { 
                if (window.XMLHttpRequest) {
                    // IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("fornecedor").innerHTML = this.responseText;
                        document.getElementById("fornecedor").style.border="1px solid #A5ACB2"
                    }
                };
                xmlhttp.open("GET","../ajax/fornecedorAjax.php?q="+str,true);
                xmlhttp.send();
            }
        }
    </script>

</head>
<body>
    <div class="container" style="margin-top:3rem">
        <div class="easyui-panel" title="Lançamento" style="width:100%;max-width:400px;padding:30px 60px;">
            <form id="ff" method="post">
                <div class="form-floating-label form-field" style="margin-bottom:10px">
                    <input class="easyui-textbox" name="name" style="width:100%" data-options="label:'Número da Nota:',labelPosition:'top'">
                </div>
                <div class="form-floating-label form-field" style="margin-bottom:20px">
                    <input class="easyui-textbox" name="email" style="width:100%" data-options="label:'Email:',labelPosition:'top',validType:'email'">
                </div>
                <div class="form-floating-label form-field" style="margin-bottom:20px">
                    <input class="easyui-textbox" name="subject" style="width:100%" data-options="label:'Subject:',labelPosition:'top'">
                </div>
            </form>
            <div style="text-align:center;padding:5px 0">
                <a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm()" style="width:80px">Submit</a>
                <a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm()" style="width:80px">Clear</a>
            </div>
                </div>
                            <h2>Items</h2>
                            <p>The DataGrid toolbar can be defined from a &lt;div&gt; markup, so you can define the layout of toolbar easily.</p>
                            <div style="margin:20px 0;"></div>
                <table class="easyui-datagrid" title="DataGrid Complex Toolbar" style="width:700px;height:250px"
                        data-options="rownumbers:true,singleSelect:true,url:'datagrid_data1.json',method:'get',toolbar:'#tb',footer:'#ft'">
                    <thead>
                        <tr>
                            <th data-options="field:'itemid',width:80">Item ID</th>
                            <th data-options="field:'productid',width:100">Product</th>
                            <th data-options="field:'listprice',width:80,align:'right'">List Price</th>
                            <th data-options="field:'unitcost',width:80,align:'right'">Unit Cost</th>
                            <th data-options="field:'attr1',width:240">Attribute</th>
                            <th data-options="field:'status',width:60,align:'center'">Status</th>
                        </tr>
                    </thead>
                </table>
                <div id="tb" style="padding:2px 5px;">
                    <a href="#" class="easyui-linkbutton" iconCls="icon-search">Search</a>
                </div>
                <div id="ft" style="padding:2px 5px;">
                    <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true"></a>
                    <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true"></a>
                    <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true"></a>
                    <a href="#" class="easyui-linkbutton" iconCls="icon-cut" plain="true"></a>
                    <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true"></a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>