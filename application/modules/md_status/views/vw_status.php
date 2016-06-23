<div id="19_tlbstatus" style="padding:5px;">
	<div style="float:left;" id=crud_19>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAddstatus_19()">Add</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnEditstatus_19()">Edit</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnDeletestatus_19()">Delete</a> 
			
	</div>
	<div style="float:right;clear:right;">
		<span>Search:</span>
		<input id="19_txtstatus" style="width:175px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnSearch_19()">Find</a>
	</div>
</div>
<table id="19_dtgstatus" class="easyui-datagrid" data-options="title:'Employee Status',url:'<?php echo base_url(); ?>index.php/md_status/fnstatusData/',toolbar:'#19_tlbstatus',rownumbers:true,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
<thead>
	<tr>
           
		   <th data-options="field:'f_status_id',title:'<b>Id</b>',hidden:true,width:40,sortable:true" halign="center"></th>
           
		   <th data-options="field:'f_status_name',title:'<b>Name</b>',width:200,sortable:true" halign="center"></th>
           
		   <th data-options="field:'f_status_remark',title:'<b>Remark</b>',width:300,sortable:true" halign="center"></th>
           	

   </tr>
</thead>
</table>
<div id="19_dlgstatus" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_19(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="19_divWait" align="left" style="padding:10px; height:200px;"><img src="http://localhost/attendance/images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="19_frastatus" id="19_frastatus" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
$(function() {
	$.ajax({
		type: 'POST',
		url: '<?php echo base_url()?>index.php/md_role_access/fnRoleAccessCrud/19/',
		dataType: 'json',
		data: {},
		success: function(data) {
			if(data.crud_19 != 1){
			$('#crud_19').hide();
			
			}	
		}
	});
});
function fnSearch_19() {
	$('#19_dtgstatus').datagrid('load',{
		statusKeyword: $('#19_txtstatus').val()
	});
}
function fnResize_19(width,height) {
	$('#19_frastatus').width(width-14);
	$('#19_frastatus').height(height-40);
}
function fnResize_19(width,height) {
	$('#19_frastatus').width(width-14);
	$('#19_frastatus').height(height-40);
}
function fnAddstatus_19() {
	$('#19_dlgstatus').dialog({
		title: 'Input Data Employee Status',
		width: 510,
		height: 230
	});
	$('#19_divWait').show();
	$('#19_frastatus').hide();
	$('#19_frastatus').attr('src','<?php echo base_url(); ?>index.php/md_status/fnstatusAdd');
	$('#19_dlgstatus').window('open');
}
function fnEditstatus_19() {
	var singleRow = $('#19_dtgstatus').datagrid('getSelected');
	if(singleRow) {
		$('#19_dlgstatus').dialog({
			title: 'Edit Data Employee Status',
			width: 510,
			height: 230
		});
		$('#19_divWait').show();
		$('#19_frastatus').hide();
						
		$('#19_frastatus').attr('src','<?php echo base_url(); ?>index.php/md_status/fnstatusEdit/'+singleRow.f_status_id);
				

		$('#19_dlgstatus').window('open');
	} else {
		alert('Select which status data you want to edit.');
	}
}
function fnSelectstatus_19() {
	var singleRow = $('#19_dtgstatus').datagrid('getSelected');
	if(singleRow) {
		var vstatusId = singleRow.status_uid;
		var vstatusLogin = singleRow.status_ulogin;
		$('#19_dlgstatus').dialog({
			title: 'Select status for '+vstatusLogin,
			width: 365,
			height: 290
		});
		$('#19_divWait').show();
		$('#19_frastatus').hide();
				
		$('#19_frastatus').attr('src','<?php echo base_url(); ?>index.php/md_status/fnstatusChoose/'+vf_status_id);
				
		$('#19_dlgstatus').window('open');
	} else {
		alert('Select status Datagrid row first.');
	}
}
function fnDeletestatus_19() {
	var singleRow = $('#19_dtgstatus').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_status/fnstatusDelete/',{Id:singleRow.f_status_id},function(result) {
				
					if (result.success) {
						$('#19_dtgstatus').datagrid('reload');
					} else {
						$.messager.show({title:'Error',msg:result.msg});
					}
				},'json');
			}
		});
	} else {
		alert('Select the data that you want to Delete.');
	}
}
</script>