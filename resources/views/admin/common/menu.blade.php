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
                    <cite>网站配置</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd>
                        <a lay-href="{{ route('admin.config.index') }}">系统配置</a>
                    </dd>
                </dl>
                <dl class="layui-nav-child">
                    <dd>
                        <a lay-href="{{ route('admin.config.email.index') }}">邮箱配置</a>
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
                        <a lay-href="{{ route('admin.friendLink.index') }}">友情链接管理</a>
                    </dd>
                </dl>
            </li>
            
            
            <li data-name="user" class="layui-nav-item">
                <a href="javascript:;" lay-tips="用户" lay-direction="2">
                    <i class="layui-icon layui-icon-set"></i>
                    <cite>服务管理</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd>
                        <a lay-href="{{ route('admin.service.index') }}">服务列表</a>
                    </dd>
                </dl>
                <dl class="layui-nav-child">
                    <dd>
                        <a lay-href="{{ route('admin.payRecord.index') }}">服务购买记录</a>
                    </dd>
                </dl>
            </li>
            
            <li data-name="user" class="layui-nav-item">
                <a href="javascript:;" lay-tips="用户" lay-direction="2">
                    <i class="layui-icon layui-icon-set"></i>
                    <cite>会员管理</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd>
                        <a lay-href="{{ route('admin.user.index') }}">会员管理</a>
                    </dd>
                </dl>
            </li>
            
            <li data-name="user" class="layui-nav-item">
                <a href="javascript:;" lay-tips="用户" lay-direction="2">
                    <i class="layui-icon layui-icon-set"></i>
                    <cite>邮件设置</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd>
                        <a lay-href="{{ route('admin.emailConfig.index') }}">邮箱配置</a>
                    </dd>
                </dl>
                
                <dl class="layui-nav-child">
                    <dd>
                        <a lay-href="{{ route('admin.email.index') }}">邮件管理</a>
                    </dd>
                </dl>
            </li>
            
            <li data-name="user" class="layui-nav-item">
                <a href="javascript:;" lay-tips="用户" lay-direction="2">
                    <i class="layui-icon layui-icon-set"></i>
                    <cite>操作记录</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd>
                        <a lay-href="{{ route('admin.operationLog.index') }}">操作记录列表</a>
                    </dd>
                </dl>
            </li>
            
            <li data-name="user" class="layui-nav-item">
                <a href="javascript:;" lay-tips="用户" lay-direction="2">
                    <i class="layui-icon layui-icon-set"></i>
                    <cite>活动管理</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd>
                        <a lay-href="{{ route('admin.activity.index') }}">活动管理列表</a>
                    </dd>
                </dl>
                <dl class="layui-nav-child">
                    <dd>
                        <a lay-href="{{ route('admin.activityRecord.index') }}">活动报名记录</a>
                    </dd>
                </dl>
            </li>
        
        </ul>
    </div>
</div>