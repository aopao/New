<div class="layui-side layui-side-menu">
    <div class="layui-side-scroll">
        <div class="layui-logo" lay-href="home/console.html">
            <span>layuiAdmin</span>
        </div>

        <ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu"
            lay-filter="layadmin-system-side-menu">
            <li data-name="home" class="layui-nav-item">
                <a href="javascript:;" lay-tips="主页" lay-direction="2">
                    <i class="layui-icon layui-icon-home"></i>
                    <cite>主页</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd data-name="console" class="layui-this">
                        <a lay-href="{{ route('admin.dashboard.show') }}">控制台</a>
                    </dd>
                </dl>
            </li>
            <li data-name="user" class="layui-nav-item">
                <a href="javascript:;" lay-tips="用户" lay-direction="2">
                    <i class="layui-icon layui-icon-read"></i>
                    <cite>文章管理</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd>
                        <a lay-href="{{ route('admin.article.index') }}">文章管理</a>
                    </dd>
                </dl>
                <dl class="layui-nav-child">
                    <dd>
                        <a lay-href="{{ route('admin.category.index') }}">分类管理</a>
                    </dd>
                </dl>
                <dl class="layui-nav-child">
                    <dd>
                        <a lay-href="{{ route('admin.copy_from.index') }}">来源管理</a>
                    </dd>
                </dl>
            </li>

            <li data-name="user" class="layui-nav-item">
                <a href="javascript:;" lay-tips="用户" lay-direction="2">
                    <i class="layui-icon layui-icon-set"></i>
                    <cite>系统设置</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd>
                        <a lay-href="{{ route('admin.config.index') }}">系统设置</a>
                    </dd>
                </dl>
            </li>

            <li data-name="user" class="layui-nav-item">
                <a href="javascript:;" lay-tips="用户" lay-direction="2">
                    <i class="layui-icon layui-icon-set"></i>
                    <cite>友情链接</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd>
                        <a lay-href="{{ route('admin.friendLink.index') }}">友情链接</a>
                    </dd>
                </dl>
            </li>

        </ul>
    </div>
</div>