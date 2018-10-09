@extends('adminlayouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!--breadcrumbs start -->
            <ul class="breadcrumb panel">
                <li><a href="{{ url('/home') }}"><i class="fa fa-home"></i> 首页</a></li>
                <li class="active">用户列表</li>
            </ul>
            <!--breadcrumbs end -->
        </div>
    </div>
    <section class="panel">
        <header class="panel-heading">
            搜索条件 Search
            <span class="tools pull-right">
                <i onclick="document.getElementById('searchForm').submit();" title="搜索" class="fa fa-search"></i>
                <a href="javascript:;" class="fa fa-chevron-down"></a>
            </span>
        </header>
        <div class="panel-body">
            <form class="form-inline" id="searchForm" action="" method="get">
                <div class="form-group col-md-6">
                    <label class="control-label col-md-2">选择日期</label>
                    <div class="col-md-5">
                        <div data-date="" class="input-group date form_datetime-adv">
                            <input type="text" class="form-control" name="from" readonly="" size="16" value="{{ strtotime(request('from'))?request('from'): '' }}">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-primary date-reset"><i class="fa fa-times"></i></button>
                                <button type="button" class="btn btn-success date-set"><i class="fa fa-calendar"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div data-date="" class="input-group date form_datetime-adv">
                            <input type="text" class="form-control" name="to" readonly="" size="16" value="{{ strtotime(request('to'))?request('to'): '' }}">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-primary date-reset"><i class="fa fa-times"></i></button>
                                <button type="button" class="btn btn-success date-set"><i class="fa fa-calendar"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
               {{-- <div class="form-group col-md-3">
                    <label for="mobile">手机号</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" value="{{ request('mobile')}}">
                </div>--}}
                <div class="form-group col-md-3">
                    <label for="name">昵称</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ request('name') }}">

                </div>
                <button type="submit" class="hidden"></button>
            </form>
        </div>
    </section>
    <section class="panel">
        <header class="panel-heading">
            用户列表 User List
            <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
            </span>
        </header>
        <div class="panel-body">
            <div class="adv-table" style="overflow: hidden; overflow-x: scroll">
                <table class="display table table-bordered table-striped">
                    <thead>
                    <tr>
                        <td style="word-break: keep-all;white-space:nowrap;" width="50px">序号</td>
                        {{--<td style="word-break: keep-all;white-space:nowrap;">操作</td>--}}
                        <td style="word-break: keep-all;white-space:nowrap;">昵称</td>
                       {{-- <td style="word-break: keep-all;white-space:nowrap;">姓名</td>--}}
                       {{-- <td style="word-break: keep-all;white-space:nowrap;">电话</td>--}}
                       {{-- <td style="word-break: keep-all;white-space:nowrap;">性别</td>--}}
                        {{--<td style="word-break: keep-all;white-space:nowrap;">地区</td>--}}
                        {{--<td style="word-break: keep-all;white-space:nowrap;">可用积分</td>--}}
                        <td style="word-break: keep-all;white-space:nowrap;">注册时间</td>
                       {{-- <td style="word-break: keep-all;white-space:nowrap;">注册IP</td>--}}
                        <td style="word-break: keep-all;white-space:nowrap;">修改时间</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td style="word-break: keep-all;white-space:nowrap;">{{ $loop->iteration }}</td>
                            {{--<td style="word-break: keep-all;white-space:nowrap;" class="text-center">--}}
                                {{--<a href="javascript:;"  title="{{ $user->status == 99 ? '禁用该用户' : '启用该用户' }}"><i class="fa {{ $user->status == 99 ? 'fa-lock' : 'fa-unlock' }}"></i></a>--}}
                                {{--<a href="javascript:delUser({{ $user->id }});" title="删除"><i class="fa fa-trash-o"></i></a>--}}
                            {{--</td>--}}
                            <td style="word-break: keep-all;white-space:nowrap;">{{ $user->name }}</td>
                            {{--<td style="word-break: keep-all;white-space:nowrap;">{{ $user->truename }}</td>--}}
                            {{--<td style="word-break: keep-all;white-space:nowrap;">{{ $user->mobile }}</td>--}}
                            {{--<td style="word-break: keep-all;white-space:nowrap;">{{ $user->sex == 'F' ? '女' : ($user->sex == 'M' ? '男' : '未知') }}</td>--}}
                            {{--<td style="word-break: keep-all;white-space:nowrap;">{{ $user->province . $user->city . $user->county }}</td>--}}
                            {{--<td style="word-break: keep-all;white-space:nowrap;">{{ $user->point_balance }}</td>--}}
                            <td style="word-break: keep-all;white-space:nowrap;">{{ $user->created_at }}</td>
                            {{--<td style="word-break: keep-all;white-space:nowrap;">{{ $user->reg_ip }}</td>--}}
                            <td style="word-break: keep-all;white-space:nowrap;">{{ $user->updated_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-right">
                {{ $users->links() }}
            </div>
        </div>
    </section>
@endsection

@section('footer')
    <!--pickers plugins-->
    <script type="text/javascript" src="{{ asset('js/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/') }}js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="{{ asset('/') }}js/bootstrap-daterangepicker/moment.min.js"></script>
    <script type="text/javascript" src="{{ asset('/') }}js/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script type="text/javascript" src="{{ asset('/') }}js/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
    <script type="text/javascript" src="{{ asset('/') }}js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
    <script src="{{ asset('js/colResizable-1.6.js') }}"></script>
    <script type="application/javascript">
        $(function() {
            $("table").colResizable({
                minWidth: 50,
                resizeMode: 'overflow',
            });
            window.prettyPrint && prettyPrint();
            $(".form_datetime-adv").datetimepicker({
                format: "yyyy-mm-dd",
                autoclose: true,
                todayBtn: true,
                minView:'month',
            });
        });
        function delUser(id)
        {
            layer.confirm('确定删除该用户？',{
                btn: ['确定', '取消']
            }, function () {
                $.post('/user/' + id, {_method : 'DELETE', _token : '{{ csrf_token() }}'}, function(e){layer.msg(e.msgDetail, {time:3}, function () {
                    window.location.reload();
                }); })
            })
        }

        function forbidUser(id, s)
        {
            var msg = s ? '禁用' : '启用';
            layer.confirm('确定' + msg + '该用户吗?', {
                btn: ['确定', '取消']
            }, function () {
                $.post('/user/forbid', {id: id, _token: '{{ csrf_token() }}'}, function(e) {
                    layer.msg(e.msg, {time: 3}, function () {
                        window.location.reload();
                    });
                })
            })
        }
    </script>
@endsection

@section('header')
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}js/bootstrap-datepicker/css/datepicker-custom.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}js/bootstrap-timepicker/css/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}js/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}js/bootstrap-datetimepicker/css/datetimepicker-custom.css" />
@endsection