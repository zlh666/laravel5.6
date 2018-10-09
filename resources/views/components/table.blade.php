<section class="panel">
    <header class="panel-heading">
        Dynamic Table
        <span class="tools pull-right">
            <a href="javascript:;" class="fa fa-chevron-down"></a>
        </span>
    </header>
    <div class="panel-body">
        <div class="adv-table">
            <table  class="display table table-bordered table-striped">
                <thead>
                <tr>
                    <td style="word-break: keep-all;white-space:nowrap;">序号</td>
                    <td style="word-break: keep-all;white-space:nowrap;">ID</td>
                    <td style="word-break: keep-all;white-space:nowrap;">用户名</td>
                    <td style="word-break: keep-all;white-space:nowrap;">真实姓名</td>
                    <td style="word-break: keep-all;white-space:nowrap;">角色</td>
                    <td style="word-break: keep-all;white-space:nowrap;">用户组</td>
                    <td style="word-break: keep-all;white-space:nowrap;">创建时间</td>
                    <td style="word-break: keep-all;white-space:nowrap;">操作</td>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td style="word-break: keep-all;white-space:nowrap;">{{ $loop->iteration }}</td>
                        <td style="word-break: keep-all;white-space:nowrap;">{{ $user->id }}</td>
                        <td style="word-break: keep-all;white-space:nowrap;">{{ $user->username }}</td>
                        <td style="word-break: keep-all;white-space:nowrap;">{{ $user->name }}</td>
                        <td style="word-break: keep-all;white-space:nowrap;">{{ join(',', $user->roles->pluck('display_name')->toArray()) }}</td>
                        <td style="word-break: keep-all;white-space:nowrap;">{{ join(',', $user->groups->pluck('name')->toArray()) }}</td>
                        <td style="word-break: keep-all;white-space:nowrap;">{{ $user->created_at }}</td>
                        <td style="word-break: keep-all;white-space:nowrap;">

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>