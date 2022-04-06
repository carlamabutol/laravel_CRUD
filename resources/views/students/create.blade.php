
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

<form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong >Image:</strong>
                <input type="file" name="image" class="form-control" placeholder="image" style="width: 50%; height: 40px;">
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>First Name:</strong>
                <input type="text" name="fname" class="form-control" placeholder="First Name" style="height: 30px;">
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Middle Name:</strong>
                <input type="text" name="mname" class="form-control" placeholder="Middle Name" style="height: 30px;">
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Last Name:</strong>
                <input type="text" name="lname" class="form-control" placeholder="Last Name" style="height: 30px;">
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Region:</strong>
                <select name="region" class="form-select form-select-lg mb-3" id="region" onchange="Selected(this)">
                    <option selected disabled>Select Region</option>
                    @foreach ($regions as $region)
                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                    @endforeach
                </select>
                <input type="hidden" id="regs" name="region">
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Province:</strong>
            <select name="province" onchange="Selected1(this)" class="form-select form-select-lg mb-3" id="province"></select>
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>City:</strong>
                <select name="city" onchange="Selected2(this)" class="form-select form-select-lg mb-3" id="city"></select>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detailed Address:</strong>
                <textarea class="form-control" style="height:70px" name="address" placeholder="Street name, Building, House No. and Barangay"></textarea>
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Birthdate:</strong>
                <input id="txtbirthdate" type="date" name="bday" maxlength="10" placeholder="mm/dd/yyyy" onchange="getAgeVal(0)" onkeyup="getAgeVal(0)" onblur="getAgeVal(0);" style="height: 30px; width: 100%">        
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Age:</strong>
                <input type="text" name="age1" id="txtage1" style="height: 30px; width: 100%"  disabled>
                <input type="hidden" name="age" id="txtage" style="height: 30px; width: 100%"  >
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary" style="border-radius: 12px;">Submit</button>
        </div>
    </div>
    
</form>


@endsection 