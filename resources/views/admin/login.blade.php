@extends('adminlayouts.simple')

@section('content')
<body class="login-body">

<div class="container">
    <form class="form-signin adminex-form" action="{{url('admin/login')}}" method="post">
        {{ csrf_field() }}
        <div class="form-signin-heading text-center">
            <h1 class="sign-title">登录</h1>
            <img src="{{asset('images/login-logo.png')}}" alt=""/>
        </div>
        <div class="login-wrap">
            <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                <input type="text" name="name" class="form-control" placeholder="用户名" autofocus value="{{old('name')}}">
                @if ($errors->has('name'))
                    <span class="help-block small">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
                <input type="password" name="password" class="form-control" placeholder="密码" value="{{old('password')}}">
                @if ($errors->has('password'))
                    <span class="help-block small">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <button class="btn btn-lg btn-login btn-block" type="submit">
                <i class="fa fa-check"></i>
            </button>

            {{--<div class="registration">--}}
                {{--Not a member yet?--}}
                {{--<a class="" href="registration.html">--}}
                    {{--Signup--}}
                {{--</a>--}}
            {{--</div>--}}
            <label class="checkbox">
                <input type="checkbox" name="remember" {{ old('remember' ? 'checked' : '') }}> 记住我
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> 忘记密码?</a>
                </span>
            </label>

        </div>
    </form>
        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
            <div class="modal-dialog">
                <form action="">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">找回密码</h4>
                    </div>
                    <div class="modal-body">
                        <p>请输入邮箱来找回密码</p>
                        <input type="text" name="mobile" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
                        <button class="btn btn-primary" type="button">提交</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!-- modal -->
</div>
</body>
<!-- Placed js at the end of the document so the pages load faster -->
@endsection

