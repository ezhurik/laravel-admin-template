@extends('layouts.main-template')

@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1 class="m-0 text-dark">Update Customer</h1>
      </div>
    </div>
  </div>
</div>

@php
$genderArr = array('Male','Female','Others');
$hobbyArr = array('Hobby1','Hobby2','Hobby3');
$hobbyExplodedArr = explode(',',$additionalResources['cutomerDetail']['hobbies']);
@endphp

<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Customer Form</h3>
        </div>
        <form role="form" name="customerEditForm" id="customerEditForm" method="POST" action="/customer/update/{{$additionalResources['cutomerDetail']['id']}}">
          @csrf
          @method('PUT')
          <div class="card-body">
            <div class="form-group">
              <label for="name">Full name</label>
              <input type="text" class="form-control @error('name') border border-danger @enderror" id="name" name="name" placeholder="Enter fullname" value="{{$additionalResources['cutomerDetail']['name']}}">
              @error('name')
              <p class="text-danger">{{$errors->first('name')}}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control @error('email') border border-danger @enderror" 
              id="email" name="email" placeholder="Enter email" value="{{$additionalResources['cutomerDetail']['email']}}">
              @error('email')
              <p class="text-danger">{{$errors->first('email')}}</p>
              @enderror
            </div>
            <div class="form-group">
              <label>Address</label>
              <textarea class="form-control @error('address') border border-danger @enderror" rows="3" id="address" name="address" placeholder="Enter address">{{$additionalResources['cutomerDetail']['address']}}</textarea>
              @error('address')
              <p class="text-danger">{{$errors->first('address')}}</p>
              @enderror
            </div>
            <div class="form-group">
              <label>Gender</label>
              <div class="d-flex">
                @foreach($genderArr as $gender)
                <div class="custom-control custom-radio mr-2">
                  <input class="custom-control-input" type="radio" id="{{$gender}}Gender" name="gender" {{$additionalResources['cutomerDetail']['gender'] == $gender ? 'checked' : '' }} value="{{$gender}}">
                  <label for="{{$gender}}Gender" class="custom-control-label">{{$gender}}</label>
                </div>
                @endforeach
              </div>
            </div>
            <div class="form-group">
              <label>Hobbies</label>
              <div class="d-flex">
                @foreach($hobbyArr as $hobby)
                <div class="form-check mr-2">
                  <input class="form-check-input" type="checkbox" name="hobbies[]" value="{{$hobby}}" {{in_array($hobby, $hobbyExplodedArr) ?'checked' : '' }}>
                  <label class="form-check-label">{{$hobby}}</label>
                </div>
                @endforeach
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

@endsection