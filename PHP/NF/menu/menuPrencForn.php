<?php
//criar um menu para selecionar o fornecedor em que a nota será lançada
//quando o usuario digitar o nome ou o cnpj do fornecedor, aparecera um menu suspenso com os fornecedores que possuem o nome ou cnpj digitado

include '../class/fornecedor.php';
include '../PDO/fornecedorPDO.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fornecedor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../jquery-easyui-1.10.4/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="../../jquery-easyui-1.10.4/themes/icon.css">
	<script type="text/javascript" src="../../jquery-easyui-1.10.4/jquery.min.js"></script>
	<script type="text/javascript" src="../../jquery-easyui-1.10.4/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="../../jquery-easyui-1.10.4/jquery.easyui.min.js"></script>
    <script>
        function teste(){
            $("#bntTeste").click((e)=>{
                e.preventDefault();
                $.get("../controller/getDataForn.php",{
                    page:1,
                    rows:10,
                    searchTerm:""
                },(data)=>{
                    console.log(data);
                });
                ;
            });
        }

        function doSearch() {
            $('#dg').datagrid('load', {
                term: $('#term').val()
            });
        }

        var url;

        function newUser() {
            $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'New User');
            $('#fm').form('clear');
            url = 'addData.php';
        }

        function editUser() {
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Edit User');
                $('#fm').form('load', row);
                url = 'editData.php?id=' + row.id;
            }
        }

        function saveUser() {
            $('#fm').form('submit', {
                url: url,
                onSubmit: function() {
                    return $(this).form('validate');
                },
                success: function(response) {
                    var respData = $.parseJSON(response);
                    if (respData.status == 0) {
                        $.messager.show({
                            title: 'Error',
                            msg: respData.msg
                        });
                    } else {
                        $('#dlg').dialog('close');
                        $('#dg').datagrid('reload');
                    }
                }
            });
        }

        function destroyUser() {
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $.messager.confirm('Confirm', 'Are you sure you want to delete this user?', function(r) {
                    if (r) {
                        $.post('deleteData.php', {
                            id: row.id
                        }, function(response) {
                            if (response.status == 1) {
                                $('#dg').datagrid('reload');
                            } else {
                                $.messager.show({
                                    title: 'Error',
                                    msg: respData.msg
                                });
                            }
                        }, 'json');
                    }
                });
            }
        }
    </script>
</head>

<body>
    <!--buscar os dados do fornecedor no bd para lancar a nf para este fornecedor!-->
    <!--campo de pesquisa de fornecedor, fazer a requisicao jquery!-->
    <div class="container">
        <h2>Selecionar Fornecedor</h2>
        <p>Selecione o fornecedor para lançar a nota</p>

        <table id="dg" class="easyui-datagrid" title="DataGrid Selection" style="width:700px;height:250px"
			data-options="singleSelect:true,url:'../teste.json',method:'get'">
            <thead>
                <tr>
                    <th data-options="field:'nome',width:80">Item ID</th>
                    <th data-options="field:'cnpj',width:100">Product</th>
                    <th data-options="field:'telefone',width:80,align:'right'">List Price</th>
                    <th data-options="field:'endereco',width:80,align:'right'">Unit Cost</th>
                    <th data-options="field:'email',width:250">Attribute</th>
                    <th data-options="field:'id',width:60,align:'center'">Status</th>
                </tr>
            </thead>
        </table>
        <script type="text/javascript">
            var toolbar = [{
                text:'Add',
                iconCls:'icon-add',
                handler:function(){
                    newUser();
                }
            }];
	    </script>          
            <div id="dlg" class="easyui-dialog" style="width:450px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
                <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
                    <h3>Informações Fornecedor</h3>
                    <div style="margin-bottom:10px">
                        <input name="nome" class="easyui-textbox" required="true" label="Nome:" style="width:100%">
                    </div>
                    <div style="margin-bottom:10px">
                        <input name="cnpj" class="easyui-textbox" required="true" label="CNPJ:" style="width:100%">
                    </div>
                    <div style="margin-bottom:10px">
                        <input name="telefone" class="easyui-textbox" required="true" label="Telefone:" style="width:100%">
                    </div>
                    <div style="margin-bottom:10px">
                        <input name="endereco" class="easyui-textbox" required="true" label="Endereco:" style="width:100%">
                    </div>
                    <div style="margin-bottom:10px">
                        <input name="email" class="easyui-textbox" validType="email" label="E-Mail:" style="width:100%">
                    </div>
                </form>
            </div>
        <div id="dlg-buttons">
            <a href="javascript:void(0);" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px;">Save</a>
            <a href="javascript:void(0);" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close');" style="width:90px;">Cancel</a>
        </div>
    </div>
</body>