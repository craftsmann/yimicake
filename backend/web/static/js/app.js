/**
 * @see https://github.com/craftsmann.
 * @author <m13993334619@163.com>
 */
$(function(){
    //导航高亮
    //console.log(decodeURIComponent(location.href));
    //console.log($("sub-menu-list").find(a));
    $(".left-side-inner a").each(function(){
        if(location.href.indexOf($(this).attr("href"))>=0){
            $(this).parents(".menu-list").addClass("nav-active");
        };
    });
});

$(function () {
   $(".in-refresh").on("click",function () {
      window.location.reload();
   });
});

$(function () {
   $(".in-clear").on("click",function () {
       var index = layer.load(1,{
           shade: [0.2,'#fff'], //0.1透明度的白色背景
           time: 1200,
       });
   });
});

$(function () {
    //批量选择、
    $(".checkall").on("click",function(){
        if($(this).attr("checked")){
            $(".checkone").attr("checked",true);
        }else{
            $(".checkone").attr("checked",false);
        }
    });
});

$(function () {
    //删除所有菜单
    $(".delallmenu").on("click",function(e) {
        e.preventDefault();
        var href  = $(this).attr("href");
        var id = [];
        if ($(".checkone:checked").length == 0) {
            layer.msg("至少选中一个！", {time: 1200});
            return;
        }
        $(".checkone:checked").each(function () {
            id.push($(this).attr("value"));
        });
        var ids = id.join(",");
        if (confirm("确定操作吗？")) {
            $.post(href, {id: ids}, function (data) {
                if (data["status"] == 1) {
                    layer.msg(data["msg"], {time: 1200}, function () {
                        location.reload();
                    });

                } else {
                    layer.msg(data["msg"], {time: 1200});
                }
            }, "json");
        }
    });
});

//菜单变化提交
$(function () {
   $(".visi-select").on("change",function () {
       $("#menu-form").submit();
   })
});

//改变菜单状态
$(function () {
   $(".change-status").on("click",function (e) {
       e.preventDefault();
       var href = $(this).attr("href");
       $.get(href,'',function (data) {
           var obj = eval("("+data+")");
           if(obj.status=='success'){
               layer.msg(obj.msg,{time: 1200},function () {
                   window.location.reload();
               });
           }else{
               layer.msg(obj.msg,{time: 1200});
           }
       })
   });
});


//改变用户状态
$(function () {
    $(".user-status").on("click",function (e) {
        e.preventDefault();
        var href = $(this).attr("href");
        $.get(href,'',function (data) {
            var obj = eval("("+data+")");
            if(obj.status=='success'){
                layer.msg("修改成功",{icon: 1, time: 1200},function () {
                    window.location.reload();
                });
            }else{
                layer.msg("修改失败",{icon: 2, time: 1200});
            }
        })
    });
});

$(function () {
    //优化单个
    $(".optimize").on("click", function (e) {
        e.preventDefault();
        var value = $(this).attr("href");
        if(confirm("确定优化？")){
            $.get(value,function (data) {
                if (data["status"] == 1) {
                    layer.msg(data["msg"], {time: 2000});
                } else {
                    layer.msg(data["msg"], {time: 2000});
                }
            }, "json");
        }
    });
});

$(function () {
   $(".db-optimiz").click(function (e) {
      e.preventDefault();
       var name = [];var str = '';
       var href = $(this).attr("href");
       var type = $(this).attr("type");
      if(confirm("确认全部优化？")){
          if(type==1){
              if($(".checkone:checked").length==0){
                  layer.msg("至少选中一个，大兄弟", {time: 2000});
                  return;
              }
              $(".checkone:checked").each(function () {
                  var data = $(this).attr("value");
                  name.push(data);
              });
              str += name.join(',');
              $.get(href,{data:str},function (res) {
                  if (res["status"] == 1) {
                      layer.msg(res["msg"], {time: 2000});
                  } else {
                      layer.msg(res["msg"], {time: 2000});
                  }
              });

          }
      }
   });
});

//备份
$(function () {
    $(".db-backall").click(function (e) {
        e.preventDefault();
        var name = [];var str = '';
        var href = $(this).attr("href");
        var type = $(this).attr("type");
        if(confirm("确认全部备份？")){
            if(type==2){
                if($(".checkone:checked").length==0){
                    layer.msg("至少选中一个，大兄弟", {time: 2000});
                    return;
                }
                $(".checkone:checked").each(function () {
                    var data = $(this).attr("value");
                    name.push(data);
                });
                str += name.join(',');
                $.get(href,{data:str},function (res) {
                    if (res["status"] == 1) {
                        layer.msg(res["msg"], {time: 2000});
                    } else {
                        layer.msg(res["msg"], {time: 2000});
                    }
                });

            }
        }
    });
});
//备份
$(function () {
    //备份单个
    $(".backupone").on("click", function (e) {
        e.preventDefault();
        var value = $(this).attr("href");
        if(confirm("确定备份该表？")){
            $.get(value,function (data) {
                if (data["status"] == 1) {
                    layer.msg(data["msg"], {time: 2000});
                } else {
                    layer.msg(data["msg"], {time: 2000});
                }
            }, "json");
        }
    });
});

//清除
$(function () {
    $("#clearall").on("click", function (e) {
        e.preventDefault();
        var value = $(this).attr('href');
        if(confirm("确定清除全部记录？")){
            $.get(value,{methods:"clearall"},function (data) {
                layer.msg(data["msg"], {time: 2000});
                window.location.reload();
            }, "json");
        }
    });
});

//查看
$(function () {
    $(".see-log").on("click", function (e) {
        e.preventDefault();
        var value = $(this).attr('href');
        layer.open({
            type:2,
            area: ['400px', '200px'],
            title:'操作描述',
            content:value,
        });
    });
});

$(function () {
   $('.goods-del').click(function (e) {
       e.preventDefault();
       var url  = $(this).attr('href');
       if(confirm("确认删除该商品？")){
           $.ajax({
               url:url,
               type:'get',
               success:function () {
                   layer.msg("删除商品成功", {time: 3000});
                   window.location.reload();
               },
               error:function () {
                   layer.msg("删除商品失败", {time: 3000});
                   window.location.reload();
               }
           });
       }
   })
});

$(function () {
    $('.single-del').click(function (e) {
        e.preventDefault();
        var url  = $(this).attr('href');
        if(confirm("确认删除该单页？")){
            $.ajax({
                url:url,
                type:'get',
                success:function () {
                    layer.msg("删除单页成功", {time: 3000});
                    window.location.reload();
                },
                error:function () {
                    layer.msg("删除单页失败", {time: 3000});
                    window.location.reload();
                }
            });
        }
    })
});

//备份
$(function () {
    $(".goods_show").click(function (e) {
        e.preventDefault();
        var name = [];var str = '';
        var href = $(this).attr("href");
        var type = $(this).attr("type");
        if(confirm("确认全部修改？")){

                if($(".checkone:checked").length==0){
                    layer.msg("至少选中一个，大兄弟", {time: 2000});
                    return;
                }
                $(".checkone:checked").each(function () {
                    var data = $(this).attr("value");
                    name.push(data);
                });
                str += name.join(',');
                $.get(href,{data:str,type:type},function (res) {
                    var obj = eval("("+res+")");
                    if (obj.status == 1) {
                        layer.msg(obj.msg, {time: 2000});
                        window.location.reload();
                    } else {
                        layer.msg(obj.msg, {time: 2000});
                        window.location.reload();
                    }
                });

            }
    });
});


//删除分类
$(function () {
    $(".del-category").on("click", function (e) {
        e.preventDefault();
        var value = $(this).attr('href');
        if(confirm("确定清除该分类？")){
            $.get(value,function (data) {
                layer.msg(data["msg"], {time: 2000});
                window.location.reload();
            }, "json");
        }
    });
});
