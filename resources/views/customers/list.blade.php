@extends('layouts.main-template')

@section('content')
  
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-dark">User List</h1>
          </div>
        </div>
      </div>
    </div>
    

    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table id="customerTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Customer Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Gender</th>
                  <th>Actions</th>
                </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection