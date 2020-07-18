@extends('layouts.default')

@section('content')     

<div class="app-main__inner">
<div class="main-card mb-3 card">
    <div class="card-header">{{$title['title']}}</div>
    <div class="card-body">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{session()->get('message')}}
            </div>
        @endif
        
        <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <th>SL.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Mobile</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                @php ($i = 1)
                @foreach ($datas as $user)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->type }}</td>
                            <td>{{ $user->mobile }}</td>
                            <td><center>{{ $user->status }}</center></td>
                            <td>
                                <div class="">
                                   <center> <img src="{{asset('storage/'.$user->image)}}" alt="avater" height="60px" width="50px"/></center>
                                </div>
                            </td>
                            <td align="center">
                                @if($user->status != 'Pending')
                                    <form action="{{ route('user.destroy',$user->id) }}" method="POST">

                                        <!-- <a class="btn btn-hover-shine btn-pill btn-info" href="{{ route('user.show',$user->id) }}">Show</a> -->

                                        <a class="btn btn-hover-shine btn-primary btn-pill" href="{{ route('user.edit',$user->id) }}">Edit</a>
                
                                        @csrf
                                        @method('DELETE')
                                        <input style="margin-left: 5px" type="submit" name="btn" class="btn btn-pill btn-hover-shine btn-danger" value="Delete">
                                    </form>
                                @else
                                <form action="{{ route('user.destroy',$user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" name="btn" class="btn btn-hover-shine btn-primary btn-pill" value="Accept">                                    
                                    <input style="margin-left: 5px" name="btn" type="submit" class="btn btn-pill btn-hover-shine btn-danger" value="Reject">
                                    <!-- <button style="margin-left: 5px" type="submit" class="btn btn-pill btn-hover-shine btn-danger">Delete</button> -->
                                </form>
                                @endif

                            </td>
                        </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection