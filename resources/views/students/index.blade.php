
@extends('students.layout')
     
@section('content')
<div class="header-middle"><!--header-middle-->
        <div >
            <div class="row">
               
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                           
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                
            </div>
            <div class="pull-right" style="">
                <a class="btn btn-success" href="{{ route('students.create') }}" style="margin-bottom: 20px; border-radius: 12px; background: darkblue"> Insert New Student</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success" style="background-color: lightblue; color: black">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr style="color: black">
            <th style="width: 1px;">No</th>
            <th style="width: 70px;">Image</th>
            <th style="width: 100px;">Name</th>
            <th style="width: 100px;">Birthday/Age</th>
            <th style="width: 80px;">City/Province/Region</th>
            <th style="width: 80px;">Street Name/Building/House No./Barangay</th>
            <th width="107px">Action</th>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/image/{{ $student->image }}" width="80px;" height="80px;"></td>
            <td>{{ $student->lname }}, {{ $student->fname }} {{ $student->mname }}</td>
            <td><?php echo date('M d, Y ', strtotime($student->bday));?><br>  {{ $student->age }}</td>
            <?php
                $name = DB::table('regions')->where('id',$student->region)->value('name');
                $name1 = DB::table('provinces')->where('id',$student->province)->value('name');
                $name2 = DB::table('cities')->where('id',$student->city)->value('name');
            ?>
            <td><?php echo $name2?>, <?php echo $name1?>, <?php echo $name?></td>
            <td>{{ $student->address }}</td>
            <td>
                <form action="{{ route('students.destroy',$student->id) }}" method="POST">
     
                    <a class="btn" style="background: lightgreen" href="{{ route('students.show',$student->id) }}"><i class="fa fa-search" ></i></a> 
                    <a class="btn" style="background: #FFD580; width: 37px;" href="{{ route('students.edit',$student->id) }}"><i class="fas fa-edit" ></i></a>
                    
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="color: black" class="btn btn-danger"><i class="fa fa-trash-o" ></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $students->links() !!}
        
@endsection 