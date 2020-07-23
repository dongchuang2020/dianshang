<!-- 导航侧栏 -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/front/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p id="yong"> <?php echo session('name'); ?></p>
                <a href="" id="a"><i class="fa fa-circle text-success"></i> </a>
            </div>
        </div>

        <!-- /.search form -->


        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu"  >
            <li class="header">菜单</li>
            <li id="admin-index"><a href="/admin"><i class="fa fa-dashboard"></i> <span>首页</span></a></li>
            <li class="treeview deng" style="display:block">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>登录</span>
                    <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                </a>
                <ul class="treeview-menu">

                    <li id="admin-login">
                        <a href="/admin/pipe_log" target="iframe">
                            <i class="fa fa-circle-o"></i>管理员添加
                        </a>
                    </li>
                </ul>
            </li>

            <!-- 菜单 -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>管理员</span>
                    <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                </a>
                <ul class="treeview-menu">

                    <li id="admin-login">
                        <a href="/admin/pipe_add" target="iframe">
                            <i class="fa fa-circle-o"></i>管理员添加
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="/admin/pipe_zhan" target="iframe">
                            <i class="fa fa-circle-o"></i>管理员展示
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>商品管理</span>
                    <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                </a>
                <ul class="treeview-menu">

                    <li id="admin-login">

                        <a href="/admins/goods" target="iframe">
                            <i class="fa fa-circle-o"></i>商品添加
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="/admins/goodslist" target="iframe">
                            <i class="fa fa-circle-o"></i>商品列表
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>品牌管理</span>
                    <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                </a>

                <ul class="treeview-menu">
                    <li id="admin-login">

                        <a href="/brand/index" target="iframe">
                            <i class="fa fa-circle-o"></i>品牌展示
                        </a>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>分类管理</span>
                    <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                </a>
                <ul class="treeview-menu">
                    <li id="admin-login">
                        <a href="cate/add" target="iframe">
                            <i class="fa fa-circle-o"></i>分类添加
                        </a>
                    </li>
                </ul>
                <ul class="treeview-menu">
                    <li id="admin-login">
                        <a href="cate/index" target="iframe">
                            <i class="fa fa-circle-o"></i>分类展示


                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>广告管理</span>
                    <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                </a>
                <ul class="treeview-menu">
                    <li id="admin-login">
                        <a href="slogan/show" target="iframe">
                            <i class="fa fa-circle-o"></i>展示
                        </a>
                    </li>
                </ul>
            </li>
             <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>角色管理</span>
                    <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id="admin-login">
                        <a href="role/show" target="iframe">
                            <i class="fa fa-circle-o"></i>展示
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>权限管理</span>
                    <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                </a>
                <ul class="treeview-menu">

                    <li id="admin-login">
                        <a href="/chmod/index" target="iframe">
                            <i class="fa fa-circle-o"></i>权限管理
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>SKU管理</span>
                    <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                </a>
                <ul class="treeview-menu">

                    <li id="admin-login">
                        <a href="/admins/addsku" target="iframe">
                            <i class="fa fa-circle-o"></i>属性名添加
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="/admins/skulist" target="iframe">
                            <i class="fa fa-circle-o"></i>属性名展示
                        </a>
                    </li>
                </ul>
                <ul class="treeview-menu">

                    <li id="admin-login">
                        <a href="/attribute/index" target="iframe">
                            <i class="fa fa-circle-o"></i>属性值管理
                        </a>
                    </li>
                </ul>
            </li>
            <!-- 菜单 /-->
        </ul>
    </section>
    <script>
        $(document).ready(function () {
            var yong=$('#yong').html();

            var addItems = document.getElementsByClassName('deng');
            if (yong){
                for (var i = 0; i < addItems.length; i++) {
                    addItems[i].style.display = 'block';
                }
                $('#a').html('未登录');
            }else {
                $('#a').html('在线');
                for (var i = 0; i < addItems.length; i++) {
                    addItems[i].style.display = 'none';
                }

            }
        })
    </script>
    <!-- /.sidebar -->
</aside>
<!-- 导航侧栏 /-->