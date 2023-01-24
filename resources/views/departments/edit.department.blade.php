@extends('layouts.admin')
@section('content')
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Edit Department!</h1>
                        </div>
                        <form class="user" method="post" action="/dashboard/department">
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" name="department" value="{{$department->name}}" class="form-control form-control-user" id="exampleFirstName"
                                        placeholder="Name of the Department">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" data-role="tagsinput" id="exampleInputEmail"
                                    placeholder="Email Address">
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Update Department
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

