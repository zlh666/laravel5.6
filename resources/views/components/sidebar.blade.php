<div class="left-side sticky-left-side">
    <!--logo and iconic logo start-->
    <div class="logo">
        <a href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}" alt=""></a>
    </div>

    <div class="logo-icon text-center">
        <a href="{{ url('/') }}"><img src="{{ asset('images/logo_icon.png') }}" alt=""></a>
    </div>
    <!--logo and iconic logo end-->


    <div class="left-side-inner">

        <!-- visible to small devices only -->
        <div class="visible-xs hidden-sm hidden-md hidden-lg">
            <div class="media logged-user">
                <img alt="" src="" class="media-object">
                <div class="media-body">
                    <h4><a href="#"></a></h4>
                    <span>"Hello There..."</span>
                </div>
            </div>

            <h5 class="left-nav-title">Account Information</h5>
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li><a href="#"><i class="fa fa-user"></i> <span>个人中心</span></a></li>
                <li><a href="#"><i class="fa fa-cog"></i> <span>设置</span></a></li>
                <li><a href="#"><i class="fa fa-sign-out"></i> <span>退出</span></a></li>
            </ul>
        </div>

        <!--sidebar nav start-->
        <ul class="nav nav-pills nav-stacked custom-nav">
            <li><a href="{{ url('users') }}"><i class="fa fa-users"></i> <span>用户管理</span></a></li>
            <li class="menu-list"><a href="javascript:;"><i class="fa fa-adn"></i> <span>学校管理</span></a>
                <ul class="sub-menu-list">
                    <li><a href="{{ url('schools/create') }}"> 添加学校</a></li>
                    <li><a href="{{ url('schools') }}"> 学校列表</a></li>
                    <li><a href="{{ url('school-subject') }}"> 学校科目列表</a></li>
                </ul>
            </li>
            <li><a href="{{ url('subjects') }}"><i class="fa fa-pencil"></i> <span>科目管理</span></a></li>
            <li><a href="{{ url('comments') }}"><i class="fa fa-list-alt"></i> <span>评论管理</span></a></li>
            <li><a href="{{ url('replys') }}"><i class="fa fa-list-alt"></i> <span>回复管理</span></a></li>
            <li><a href="{{ url('seniors') }}"><i class="fa fa-list-ul"></i> <span>学长管理</span></a></li>
            <li><a href="{{ url('chat/list') }}"><i class="fa fa-list-ul"></i> <span>聊天管理</span></a></li>
            <li><a href="{{ url('goods') }}"><i class="fa fa-list-ul"></i> <span>商品管理</span></a></li>
            <li><a href="{{ url('orders') }}"><i class="fa fa-list-ul"></i> <span>订单管理</span></a></li>
        </ul>
        <!--sidebar nav end-->

    </div>
</div>