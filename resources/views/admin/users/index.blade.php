
@extends('layouts.admin')
@section('content')
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      @if(Session::has("deleted_user"))

    <p class="bg-danger" style="padding:10px: ">{{session('deleted_user')}}</p>

    @endif
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Photo</th>
                  <th>name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Status</th>
                  
                  <th>Date Created</th>
                  <th>Date Updated</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @if($users)
                    @foreach($users as $user)
                <tr>
                  <td>{{$user->id}}</td>
                  
                  <td><img  height='50px' src="{{$user->photo ? $user->photo->file : '/images/noimage.jpg'}}" ></td>
                  <td >{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->role->name}}</td>
                  <td>{{$user->is_active==1 ? 'Active' : 'Not Active'}}</td>
                  
                  <td>{{$user->created_at->diffForHumans()}}</td>
                  <td>{{$user->updated_at->diffForHumans()}}</td>
                  
                  <td><a href="{{route('admin.users.edit' , $user->id)}}" title="Edit"><button  style="width:80px;height:30px;background:#93268f;border:none;padding: 10px;" class="btn btn-primary btn-sm"><i class="fa fa-edit 2x " style="color:#fff;"></i></button></a></td>
                  <td><a href="{{route('admin.users.edit' , $user->id)}}" title="Delete"><button  style="width:80px;height:30px;background:red;border:none;padding: 10px;" class="btn btn-danger btn-sm"><i class="fa fa-times 2x " style="color:#fff;"></i></button></a></td>
                </tr>
                @endforeach
                {{$users->links()}}
            @endif
                
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

    </section>
    <!-- /.content -->

    
@endsection
