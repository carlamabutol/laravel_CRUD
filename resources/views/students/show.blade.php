
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
     
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong style="margin-right: 100px; background-color: lightblue; padding: 8px; border-radius: 12px;">Image:</strong>
                <img src="/image/{{ $student->image }}" width="300px;">
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8" style="margin-bottom: 10px;">
            <div class="form-group">
                <strong style="margin-right: 10px; background-color: lightblue; padding: 8px; border-radius: 12px;">Name:</strong>
                {{ $student->lname }}, {{ $student->fname }} {{ $student->mname }}
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8" style="margin-bottom: 10px;">
            <div class="form-group">
                <strong style="margin-right: 10px; background-color: lightblue; padding: 8px; border-radius: 12px;">Birthday/Age:</strong>
                <?php echo date('M d, Y ', strtotime($student->bday));?> and {{ $student->age }}
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8" style="margin-bottom: 10px;">
            <div class="form-group">
                <strong style="margin-right: 10px; background-color: lightblue; padding: 8px; border-radius: 12px;">City/Province/Region:</strong>
                <?php
                $name = DB::table('regions')->where('id',$student->region)->value('name');
                $name1 = DB::table('provinces')->where('id',$student->province)->value('name');
                $name2 = DB::table('cities')->where('id',$student->city)->value('name');
                ?>
                <?php echo $name2?>, <?php echo $name1?>, <?php echo $name?> 
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8" style="margin-bottom: 10px;">
            <div class="form-group">
                <strong style="margin-right: 10px; background-color: lightblue; padding: 8px; border-radius: 12px;">Street Name/Building/House No./Barangay:</strong>
                {{ $student->address }}
            </div>
        </div>
    
    </div>
@endsection 