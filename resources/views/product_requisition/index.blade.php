@extends('layouts.defaultUser')

@section('content')     

<div class="app-main__inner">
<div class="main-card mb-3 card">
    <div class="card-header">data List</div>
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
                    <th>Quantity</th>
                    <th>Price (per unit)</th>
                    <th>Brand</th>
                    <th>Product Type</th>
                    <th>Category</th>
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
                            <td>{{ $data->name }}</td>
                            <td><center>{{ $data->quantity.' '.$data->unit }}</center></td>
                            <td><center>{{ $data->price.' taka'}}</center></td>
                            <td>{{ $data->brand }}</td>
                            <td>{{ $data->type }}</td>
                            <td>{{ $data->category }}</td>
                            <td>
                                <div class="">
                                   <center> <img src="{{asset('storage/'.$data->image)}}" alt="avater" height="60px" width="50px"/></center>

                                </div>
                            </td>
                            <td align="center">
                                <form action="{{ route('requisition.destroy',$data->id) }}" method="POST">
                
                                    <!-- <a class="btn btn-hover-shine btn-pill btn-info" href="{{ route('requisition.show',$data->id) }}">Show</a> -->

                                    <a class="btn btn-hover-shine btn-primary btn-pill" href="{{ route('requisition.edit',$data->id) }}">Request</a>
                
                                    @csrf
                                    @method('DELETE')
                    
                                    <!-- <button style="margin-left: 5px" type="submit" class="btn btn-pill btn-hover-shine btn-danger">Request</button> -->
                                </form>
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