<form method="post" action="viewthread.php" target="_blank">
	<h2 align="center">����������ʾ</h2>
         	<!-- ���涨��һ��ѡ�ʹ����ʽ����������� -->
		<div style="width:200; float:left">
			<h5>ѡ��</h5>
			<ul style="list-style:none;margin:0px;padding:0px">
				<li><input type="checkbox" name="parse[]" value="1"> ɾ��HTML��ǩ</li>
				<li><input type="checkbox" name="parse[]" value="2"> ת��HTML��ǩΪʵ��</li>
				<li><input type="checkbox" name="parse[]" value="3"> ʹ��UBB����</li>
				<li><input type="checkbox" name="parse[]" value="4"> ����URLʶ��</li>
				<li title="���õı��飺
��:), /wx, ΢Ц����:@, /fn, ��ŭ��
��:kiss, /kill,/sa,ʾ����
��:p, /tx, ͵Ц����:q, /dk, ��ޡ�"><input type="checkbox" name="parse[]" value="5"> ʹ�ñ���</li>
				<li><input type="checkbox" name="parse[]" value="6"> ���÷Ƿ��ؼ���</li>
				<li><input type="checkbox" name="parse[]" value="7"> PHP������Ϊ����</li>
				<li><input type="checkbox" name="parse[]" value="8"> ԭ����ʾ</li>
				<li><input type="checkbox" name="parse[]" value="9"> ͬ������</li>
			</ul>   
		</div>
         	<!-- ���涨�����µı�����������ݵ������ʹ����ʽ��ȡ���������ұ���ʾ -->
		<div style="width:300; float:left">
		        <h5>����<input type="text" name="subject" size=50></h5>
			<h5>����<textarea  rows="7" cols="50" name="message"></textarea></h5>
			<input type="submit" name="replysubmit" value="��������">
		</div>
	</table>
</form>
