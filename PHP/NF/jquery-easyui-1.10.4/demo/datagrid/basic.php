
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Basic DataGrid - jQuery EasyUI Demo</title>
	<link rel="stylesheet" type="text/css" href="../../themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="../../themes/icon.css">
	<link rel="stylesheet" type="text/css" href="../demo.css">
	<script type="text/javascript" src="../../jquery.min.js"></script>
	<script type="text/javascript" src="../../jquery.easyui.min.js"></script>
</head>
<body>
	<h2>Basic DataGrid</h2>
	<p>The DataGrid is created from markup, no JavaScript code needed.</p>
	<div id="toolbar">
		<div id="tb">
			<input id="term" placeholder="Digite o nome do fornecedor ou CNPJ">
			<a href="javascript:void(0);" class="easyui-linkbutton" plain="true" onclick="doSearch()">Search</a>
		</div>
	</div>
	<div style="margin:20px 0;">
		<a href="#" class="easyui-linkbutton" onclick="getSelected()">Continuar</a>
	</div>
	<table id="dg" class="easyui-datagrid" title="DataGrid Selection" style="width:700px;height:250px"
			data-options="singleSelect:true,url:'teste.json',method:'get'">
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
		function getSelected(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.alert('Info', row.nome+":"+row.cnpj+":"+row.id);
			}
		}
	</script>

</body>
</html>