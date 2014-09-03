$(document).ready(function(){
	$("#addrcd").click(function(){
		$("#rcdbody").append('<tr> <th id="" class="rcdname" ><input name="host" class="rcdname" type="text" /></th><th id="" class="rcdtype" ><select name="type">  	  <option  value="A">A</option>  	  <option  value="NS">NS</option>  	  <option  value="CNAME">CNAME</option>  	  <option  value="AAAA">AAAA</option>  	</select>  </th><th id="" class="rcddata" ><input class="rcddata" type="text" name="rcd_data" /></th><th id="" class="priority" ><input class="priority" type="text" name="rcd_priority" ></th><th id="" class="ttl" ><input class="ttl" type="text" name="rcd_ttl" /></th><th class="operator" ><span><a href="add" id="sav_rcd">保存</a>&nbsp;&nbsp;<a href="" id="cle_rcd">取消</a></span></th></tr>');
	});
});
