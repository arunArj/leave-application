@extends('layouts.admin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>
    <p class="mb-4"></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Departments</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Deparment</th>
                            <th>Reporting mail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $item)
                            <tr>
                                <td><a href="/dashboard/department/edit/{{$item->id}}">{{$item->department}}</td>
                                <td>{{$item->reporting_emails}}</td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{$departments->links()}}
                @include('layouts.inc.pagination_links')
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
@endsection
