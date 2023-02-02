@extends('layouts.admin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>
    <p class="mb-4"></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Employees</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>#</th>
                            <th>EMP ID</th>
                            <th>Employee</th>
                            <th>Department</th>
                            <th>Join Date</th>
                            <th>Designation</th>
                            <th> mail</th>
                            <th>image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=0;

                        @endphp

                        @forelse($employees as $item)
                         @if ($item->job_status)
                            <tr style="background-color: #c3ecc3">
                        @else
                                    <tr style="background-color: rgb(224, 179, 157)">
                                @endif
                                <td>{{++$i}}</td>
                                <td>{{$item->employee_id}}</td>
                                <td><a href="/dashboard/employees/{{$item->id}}">{{$item->fullname}}</td>
                                <td>{{$item->departments->department}}</td>
                                <td>{{$item->joining_date}}</td>
                                <td>{{$item->designation}}</td>
                                <td>{{$item->mail_id}}</td>
                                <td>{{$item->mail_id}}</td>

                            </tr>
                            @empty
                            <tr><td colspan="2" class="empty-record"> <h3>no records found</h3></td></tr>
                        @endforelse

                    </tbody>
                </table>
                {{$employees->links()}}
                <div style="display:inline!important; background-color: #c3ecc3 ">permanent</div>
                <div style="display:inline; background-color:  rgb(224, 179, 157) ">probation</div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>

@endsection
