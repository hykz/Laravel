@extends('layout')

@section('title')
Index Users
@endsection

@section('subtitle')
Index Users
@endsection


@section('content')
    <script>
        init.push(function () {
            $('#jq-datatables-example').dataTable();
            $('#jq-datatables-example_wrapper .table-caption').text('Users Table');
            $('#jq-datatables-example_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
        });
    </script>
    <!-- / Javascript -->

    <div class="panel">
        <div class="panel-body">
            <div class="table-primary">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Username</th>
                        <th>email</th>
                        <th>City</th>
                        <th>Action DB</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($user as $use)
                        <tr>
                            <td style="max-width: 50%"><a href="{{ route('users.read', [ 'id' => $use->id ] ) }}"><img style="width: 100%; height: 100px;" src="{{ $use->avatar }}" alt=""></a></td>
                            <td>{{ $use->username }}</td>
                            <td>{{ $use->email }}</td>
                            <td>{{ $use->ville }}</td>
                            <td><a href="{{ route('users.delete', [ 'id' => $use->id ] ) }}"><button class="btn btn-danger">Delete</button></a>
                                <a href="{{ route('users.update', [ 'id' => $use->id ] ) }}"><button class="btn btn-warning">Update</button></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('breadscrumb')
<ul class="breadcrumb breadcrumb-page">
    <div class="breadcrumb-label text-light-gray">You are here: </div>
    <li><a href="#">Users</a></li>
    <li class="active"><a href="#">Index</a></li>
</ul>
@endsection