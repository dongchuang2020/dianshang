<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap 实例</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    省:<select name="province" id="" class="changearea">
        <option value="" selected="selected">--请选择--</option>
        @foreach($data as $v)
        <option value="{{$v['id']}}" >{{$v['name']}}</option>
        @endforeach
    </select>
    城市:
    <select name="city" id="city">
        <option value="" selected="selected">--请选择--</option>
    </select>
    区
    <select name="area" id="crea">
        <option value="" selected="selected">--请选择--</option>
    </select>
</div>

</body>
</html>
<script>
    $(document).on('change','.changearea',function () {
       var id = $(this).val();

       var url = '/admins/getcity';
        $.ajax({
            url:url,
            data:{'id':id},
            dataType:'json',
            type: "post",
            success:function (res) {
                $("select[name='city']").empty();
                $.each(res,function(k,v){
                    var _option = "";
                    _option += "<option value='"+v.id+"'>"+v.name+"</option>";
                    $("select[name='city']").append(_option);
                });
            }
        })
    })
    $(document).on('change','#city',function () {
        var id = $(this).val();
        var url = '/admins/getarea';
        $.ajax({
            url:url,
            data:{'id':id},
            dataType:'json',
            type: "post",
            success:function (res) {
                $("select[name='area']").empty();
                $.each(res,function (k,v) {
                    var _option = "";
                    _option += "<option value='"+v.id+"'>"+v.name+"</option>";
                    $("select[name='area']").append(_option);
                })
            }
        })
    })
</script>