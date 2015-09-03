@extends('layout')

@section('title')
Index Directors
@endsection

@section('subtitle')
Index Directors
@endsection


@section('content')
    <script>
        init.push(function () {
            $('#jq-datatables-example').dataTable();
            $('#jq-datatables-example_wrapper .table-caption').text('Directors Table');
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
                        <th>Name</th>
                        <th>Birthday</th>
                        <th>City</th>
                        <th>Action DB</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($directors as $director)
                        <tr>
                            <td style="max-width: 50%"><a href="{{ route('directors.read', [ 'id' => $director->id ] ) }}"><img style="width: 100%; height: 100px;" src="{{ $director->image }}" alt=""></a></td>
                            <td>{{ $director->firstname }} {{ $director->lastname }}</td>
                            <td>{{ $director->dob }}</td>
                            <td>{{ $director->city }}</td>
                            <td><a href="{{ route('directors.delete', [ 'id' => $director->id ] ) }}"><button class="btn btn-danger">Delete</button></a>
                                <a href="{{ route('directors.update', [ 'id' => $director->id ] ) }}"><button class="btn btn-warning">Update</button></a>
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
    <li><a href="#">Directors</a></li>
    <li class="active"><a href="#">Index</a></li>
</ul>
@endsection