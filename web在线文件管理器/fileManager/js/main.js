function show (dis) {
	document.getElementById(dis).style.display = 'block';
}

function delFile(filename) {
	if (confirm('确定要删除此文件吗？')) {
		location.href = 'index.php?act=delFile&filename=' + filename;
	}
}

// 弹出图片
function showDetail(t, filename) {
	console.log('ok');
	$('#showImg').attr('src', filename);
	$('#showDetail').dialog({
		height: 'auto',
		width: 'auto',
		position: {my: 'center', at: 'center', collision: 'fit'},
		modal: false,    // 是否模式对话框
		draggable: true, // 是否允许拖拽
		resizable: true, // 是否允许拖动
		title: t,        // 对话框标题
		show: 'slide',
		hide: 'explode'
	});
}
function goBack($back) {
	console.log('$back', $back);
	// location.href = 'index.php?path=' + $back;
	location.href = 'index.php?path=file';
}
function delFolder(dirname, path) {
	console.log('dirname: ', dirname, 'path: ',path);
	if (confirm('确定删除此文件夹吗？')) {
		location.href = 'index.php?act=delFolder&dirname=' + dirname + '&path=' + path;
	}
}