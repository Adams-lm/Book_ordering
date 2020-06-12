$(document).ready(function(){
    
  //var input_text=$("#order").val();当前学院？{inputText:input_text}
  //显示领书单
    $.post("../../php/confirm_db.php","",function(data){
        data=$.parseJSON(data);
        var str="";
        if(!data[0]){
            //无数据
            str+="<tr>";
            str+="<td  class='col-md-12'colspan='5'>暂无领书单</td>";
            str+="</tr>";
        }else{
            $.each(data,function(index,item){ 
                str+="<tr>";
                // str+="<td class='col-md-1'>"+item.dept_id+"</td>";
                str+="<td class='col-md-3'>"+item.dept_name+"</td>";
                str+="<td class='col-md-2'>"+item.num+"</td>";
                str+="<td class='col-md-2'>"+item.total_price+"</td>";
                str+="<td class='col-md-3'>"+item.date+"</td>";
                if(item.is_get == 0){
                    str+="<td class='col-md-2'><a class='btn btn-success btn_confirm' href='../../php/confirmBtn.php?d_id="+item.dept_id+"'>确认领取</a></td>";
                }else if(item.is_get == 1){
                    str+="<td class='col-md-2'><span>已确认</span></td>";
                }
                str+="</tr>";
            });
        } 
        $("#confirm_list").html(str);  
    });

  });