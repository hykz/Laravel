@extends('layout')

@section('title')
Index Category
@endsection

@section('subtitle')
Index Category
@endsection


@section('content')
    <script>
        init.push(function () {
            $('#jq-datatables-example').dataTable();
            $('#jq-datatables-example_wrapper .table-caption').text('Category Table');
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
                        <th>Action DB</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($categories as $categorie)
                        <tr>
                            <td style="max-width: 50%"><a href="{{ route('category.read', [ 'id' => $categorie->id ] ) }}"><img style="width: 100%; height: 100px;" src="{{ $categorie->image }}" alt=""></a></td>
                            <td>{{ $categorie->title }}</td>
                            <td><a href="{{ route('category.delete', [ 'id' => $categorie->id ] ) }}"><button class="btn btn-danger">Delete</button></a>
                                <a href="{{ route('category.update', [ 'id' => $categorie->id ] ) }}"><button class="btn btn-warning">Update</button></a>
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
    <li><a href="#">Category</a></li>
    <li class="active"><a href="#">Index</a></li>
</ul>
@endsection