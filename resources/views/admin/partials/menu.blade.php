<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">APP管理</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('/admin/home') }}" class="nav-link {{ request()->is('admin/home') || request()->is('admin/home/*') ? 'active' : '' }}">
                        <p>
                            <i class="fas fa-tachometer-alt">

                            </i>
                            <span>ダッシュボード</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/posts') }}" class="nav-link {{ request()->is('admin/posts') || request()->is('admin/posts/*') ? 'active' : '' }}">
                        <p>
                            <i class="nav-icon fa fa-list">

                            </i>
                            <span>投稿管理</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/admin/categories') }}" class="nav-link {{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : '' }}">
                        <p>
                            <i class="nav-icon fa fa-list">

                            </i>
                            <span>カテゴリ管理</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/admin/tags') }}" class="nav-link {{ request()->is('admin/tags') || request()->is('admin/tags/*') ? 'active' : '' }}">
                        <p>
                            <i class="nav-icon fa fa-list">

                            </i>
                            <span>タグ管理</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/admin/users') }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                        <p>
                            <i class="nav-icon fa fa-list">

                            </i>
                            <span>ユーザー管理</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/admin/contacts') }}" class="nav-link {{ request()->is('admin/contacts') || request()->is('admin/contacts/*') ? 'active' : '' }}">
                        <p>
                            <i class="nav-icon fa fa-list">

                            </i>
                            <span>お問い合わせ管理</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/admin/password') }}" class="nav-link {{ request()->is('admin/password') || request()->is('admin/password/*') ? 'active' : '' }}">
                        <p>
                            <i class="nav-icon fa fa-list">

                            </i>
                            <span>パスワード変更</span>
                        </p>
                    </a>
                </li>
                
                <!--
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-dashboard"></i>
                    <p>
                        Dashboard
                        <i class="right fa fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../../index.html" class="nav-link">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>Dashboard v1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/shopadmin/girls') }}" class="nav-link">
                                <p>
                                    <i class="nav-icon fa fa-list">

                                    </i>
                                    <span>女の子管理</span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                -->
                
                <li class="nav-item">
                    <a href="{{ url('/admin/imagekanri') }}" class="nav-link {{ request()->is('admin/imagekanri') || request()->is('admin/imagekanri/*') ? 'active' : '' }}">
                        <p>
                            <i class="nav-icon fa fa-list">

                            </i>
                            <span>画像管理</span>
                        </p>
                    </a>
                </li>

                
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-sign-out-alt">

                            </i>
                            <span>ログアウト</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
