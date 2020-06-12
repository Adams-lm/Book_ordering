$(document).ready(function(){

  //隐藏查询结果提示语
  $("#search_title").hide();
  $.post("../../php/getOrderList.php","",function(data){
      data=$.parseJSON(data);
      str="";
      if(!data[0]){
        //无数据
        str+="<tr>";
        str+="<td  class='col-md-12'colspan='3'>暂无订单</td>";
        str+="</tr>";
    }else{
      $.each(data,function(index,item){
          str+="<tr>";
          //str+="<td class='col-md-1'>".$row[0]."</td>";
          str+="<td class='col-md-2'>"+item.class_name+"</td>";
          str+="<td class='col-md-1'>"+item.totalNums+"</td>";
          if (item.totalPrice==null) item.totalPrice=0;
          str+="<td class='col-md-2'> ￥ "+item.totalPrice+"</td>";
          str+="</tr>";
      });
      
    }
    $("#table_list").after(str);
  });

  //查询按钮
  $("#btn_search").click(function(){
    input_text=$("#order_name").val();
    if(!input_text){
      alert("班级名称无效，请重新输入！");
      return;
    }
    console.log(input_text);
    //得到查询结果集并展示
    $.post("../../php/searchOrder_db.php",{className:input_text},function(data){
      data=$.parseJSON(data);
      if(!data[0].class_name){
          alert("班级名称无效，请重新输入！");
      }else{
        str="";
        str+="<tr>";
        // str+="<td class='title col-md-1'>班级编号</td>"
        str+="<td class='title col-md-2'>班级</td>"
        str+="<td class='title col-md-1'>订书数量</td>"
        str+="<td class='title col-md-2'>总价格</td>"
        str+="</tr>";
        $.each(data,function(index,item){
          str+="<tr>";
          // str+="<td class='col-md-1'>"+data[0].class_id+"</td>";
          str+="<td class='col-md-2'>"+item.class_name+"</td>";
          str+="<td class='col-md-1'>"+item.totalNums+"</td>";
          // null值改为0
          if (item.totalPrice==null) item.totalPrice=0;
          str+="<td class='col-md-2'>"+item.totalPrice +"</td>";
          str+="</tr>";
        });
        str+="<br>";
        //显示查询结果提示语
        $("#search_title").show();
        $("#tb_search").empty();
        $("#tb_search").html(str);
      } 
    });
  });
});