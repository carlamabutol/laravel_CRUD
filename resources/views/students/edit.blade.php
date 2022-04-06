
@extends('students.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            </div>
            <div class="pull-right">
                <a style="border-radius: 12px;" class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
            </div>
        </div>
    </div>
     
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('students.update',$student->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
     
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="image" style="height: 40px; width: 50%;">
                    <img src="/image/{{ $student->image }}" width="25%" style="margin-bottom: 10px;">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>First Name:</strong>
                    <input type="text" name="fname" value="{{ $student->fname }}" class="form-control" placeholder="First Name"style="height: 30px;">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Middle Name:</strong>
                    <input type="text" name="mname" value="{{ $student->mname }}" class="form-control" placeholder="Middle Name" style="height: 30px;">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Last Name:</strong>
                    <input type="text" name="lname" value="{{ $student->lname }}" class="form-control" placeholder="Last Name" style="height: 30px;">
                </div>
            </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Region:</strong>
                <select name="region" class="form-select form-select-lg mb-3" id="region" onchange="Selected2(this)">
                    
                    @foreach ($regions as $region)

                    <option value="{{ $region->id }}" {{$region->id == $student->region ? 'selected' : ''}}>{{ $region->name }}</option>
                    @endforeach
                </select>
            </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Province:</strong>
                <select name="province" onchange="Selected12(this)" class="form-select form-select-lg mb-3" id="province">
                    @foreach ($provinces as $province)

                    <option value="{{ $province->id }}" {{$province->id == $student->province ? 'selected' : ''}}>{{ $province->name }}</option>
                    @endforeach
                </select>

                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>City:</strong>
                    <select name="city" onchange="Selected22(this)" class="form-select form-select-lg mb-3" id="city">
                        @foreach ($cities as $city)

                    <option value="{{ $city->id }}" {{$city->id == $student->city ? 'selected' : ''}}>{{ $city->name }}</option>
                    @endforeach
                    </select>

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detailed Address:</strong>
                    <textarea class="form-control" style="height:70px" name="address" placeholder="Detail Address">{{ $student->address }}</textarea>
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Birthday:</strong>
                    <input id="txtbirthdate" type="date" name="bday" value="{{ $student->bday }}" class="form-control"  style="height: 30px;" onchange="getAgeVal(0)" onkeyup="getAgeVal(0)" onblur="getAgeVal(0);">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Age:</strong>
                    <input type="text" name="age1" id="txtage1"  value="{{ $student->age }}" class="form-control"  style="height: 30px;" disabled>
                    <input type="hidden" name="age" id="txtage"  value="{{ $student->age }}" class="form-control"  style="height: 30px;">
                </div>
            </div>
            
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary" style="border-radius: 12px">Update</button>
            </div>
        </div>
     
    </form>
@endsection 