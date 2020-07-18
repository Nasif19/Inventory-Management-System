@extends('layouts.default')

@section('content')     

<div class="app-main__inner">
<div class="main-card mb-3 card">
    <div class="card-header">{{$val['status']}} List</div>
    <div class="card-body">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{session()->get('message')}}
            </div>
        @elseif(session()->has('msg'))
        <div class="alert alert-danger">
                {{session()->get('msg')}}
            </div>
        @endif
        
        <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <th>SL.</th>
                    <th>Requestor Name</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <!-- <th>Brand</th>
                    <th>Product Type</th> -->
                    <th>Status</th>
                    <th>Image</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                @php ($i = 1)
                @foreach ($datas as $data)
                    @if($data->is_delete != 1)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{$data->username}}</td>
                            <td>{{ $data->name }}</td>
                            <td><center>{{ $data->quantity.' '.$data->unit }}</center></td>
                            <td><center>{{ $data->total_price.' BDT'}}</center></td>
                            @if($data->status == 'Accepted')
                                <td style="color: green"><center>{{ $data->status}}</center></td>
                            @elseif($data->status == 'Rejected')
                            <td style="color: red"><center>{{ $data->status}}</center></td>
                            @else
                            <td style="color: blue"><center>{{ $data->status}}</center></td>
                            @endif
                            <td>
                                <div class="">
                                   <center> <img src="{{asset('storage/'.$data->image)}}" alt="avater" height="80px" width="80px"/></center>
                                </div>
                            </td>
                            <td align="center">
                                @if($val['status'] =='Pending')
                                    <form action="{{route('request.update',$data->id)}}" method="POST">
                                    @csrf           
                                    @method('PUT')
                                        
                                        <a href="{{route('request.update',$data->id)}}"><input type="submit" name="btn" class="btn btn-hover-shine btn-primary btn-pill" value="Accept"></a>
                                                         
                                        <input style="margin-left: 5px" type="submit" name="btn" class="btn btn-pill btn-hover-shine btn-danger" value="Reject">

                                        <a class="btn btn-hover-shine btn-pill btn-info" href="{{route('request.edit',$data->id)}}">Edit</a>
                                    </form>
                                @elseif($val['status'] =='Accepted')
                                    <form action="{{route('request.update',$data->id)}}" method="POST">
                                        @csrf           
                                        @method('PUT')
                                        
                                        <!-- <a href="{{route('request.update',$data->id)}}"><input type="submit" name="btn" class="btn btn-hover-shine btn-primary btn-pill" value="Accept"></a> -->
                                                         
                                        <input style="margin-left: 5px" type="submit" name="btn" class="btn btn-pill btn-hover-shine btn-danger" value="Undo">

                                        <!-- <a class="btn btn-hover-shine btn-pill btn-info" href="{{route('request.edit',$data->id)}}">Edit</a> -->
                                    </form>

                                @elseif($val['status'] =='Rejected')
                                    <form action="{{route('request.update',$data->id)}}" method="POST">
                                        @csrf           
                                        @method('PUT')
                                        
                                        <a href="{{route('request.update',$data->id)}}"><input type="submit" name="btn" class="btn btn-hover-shine btn-primary btn-pill" value="Accept"></a>
                                                         
                                        <input style="margin-left: 5px" type="submit" name="btn" class="btn btn-hover-shine btn-pill btn-info" value="Pending">

                                        <!-- <a class="btn btn-hover-shine btn-pill btn-info" href="{{route('request.edit',$data->id)}}">Edit</a> -->
                                    </form>
                                
                                @endif
                                
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection