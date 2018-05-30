@include('admin.common.header')
<body class="layui-layout-body">
<div id="LAY_app">
    <div class="layui-layout layui-layout-admin">
        <!-- 顶部菜单 -->
    @include('admin.common.top')

    <!-- 侧边菜单 -->
    @include('admin.common.menu')

    <!-- 页面标签 -->
    @include('admin.common.tab')

    <!-- 主体内容 -->
        <div class="layui-body" id="LAY_app_body">
            <div class="layadmin-tabsbody-item layui-show">
                @yield('content')
            </div>
        </div>

        <!-- 辅助元素，一般用于移动设备下遮罩 -->
        <div class="layadmin-body-shade" layadmin-event="shade"></div>
    </div>
</div>

<script src="{{ asset("theme/layui/layui.js") }}"></script>
@yield('js')
</body></html>


