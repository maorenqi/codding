<form method="post" action="viewthread.php" target="_blank">
	<h2 align="center">发表文章演示</h2>
         	<!-- 下面定义一组选项，使用样式表将其入在左边 -->
		<div style="width:200; float:left">
			<h5>选项</h5>
			<ul style="list-style:none;margin:0px;padding:0px">
				<li><input type="checkbox" name="parse[]" value="1"> 删除HTML标签</li>
				<li><input type="checkbox" name="parse[]" value="2"> 转换HTML标签为实体</li>
				<li><input type="checkbox" name="parse[]" value="3"> 使用UBB代码</li>
				<li><input type="checkbox" name="parse[]" value="4"> 开启URL识别</li>
				<li title="可用的表情：
【:), /wx, 微笑】【:@, /fn, 发怒】
【:kiss, /kill,/sa,示爱】
【:p, /tx, 偷笑】【:q, /dk, 大哭】"><input type="checkbox" name="parse[]" value="5"> 使用表情</li>
				<li><input type="checkbox" name="parse[]" value="6"> 禁用非法关键字</li>
				<li><input type="checkbox" name="parse[]" value="7"> PHP代码设为高亮</li>
				<li><input type="checkbox" name="parse[]" value="8"> 原样显示</li>
				<li><input type="checkbox" name="parse[]" value="9"> 同步换行</li>
			</ul>   
		</div>
         	<!-- 下面定义文章的标题和文章内容的输入框，使用样式表取消换行在右边显示 -->
		<div style="width:300; float:left">
		        <h5>标题<input type="text" name="subject" size=50></h5>
			<h5>内容<textarea  rows="7" cols="50" name="message"></textarea></h5>
			<input type="submit" name="replysubmit" value="发表帖子">
		</div>
	</table>
</form>
