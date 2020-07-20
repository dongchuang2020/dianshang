@include("admin.head");
@include("admin.left");




    <!-- 内容区域 -->
    <div class="content-wrapper">
        <iframe width="100%" id="iframe" name="iframe"	onload="SetIFrameHeight()"
                frameborder="0" src="admin_home"></iframe>

    </div>
    <!-- 内容区域 /-->
@include("admin.bottom");
