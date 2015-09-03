@extends('layout')

@section('title')
Index Actors
@endsection

@section('subtitle')
Index Actors
@endsection



@section('content')
    <script>
        init.push(function () {
            $('#jq-datatables-example').dataTable();
            $('#jq-datatables-example_wrapper .table-caption').text('Actors Table');
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

@foreach($actors as $actor)
    <tr>
        <td style="max-width: 50%"><a href="{{ route('actors.read', [ 'id' => $actor->id ] ) }}"><img style="width: 100%; height: 100px;" src="{{ $actor->image }}" alt=""></a></td>
        <td>{{ $actor->firstname }} {{ $actor->lastname }}</td>
        <td>{{ $actor->dob }}</td>
        <td>{{ $actor->city }}</td>
        <td><a href="{{ route('actors.delete', [ 'id' => $actor->id ] ) }}"><button class="btn btn-danger">Delete</button></a>
            <a href="{{ route('actors.update', [ 'id' => $actor->id ] ) }}"><button class="btn btn-warning">Update</button></a>
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
    <li><a href="#">Actors</a></li>
    <li class="active"><a href="#">Index</a></li>
</ul>
@endsection