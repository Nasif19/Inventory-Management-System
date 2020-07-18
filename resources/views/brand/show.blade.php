@extends('layouts.default')

@section('content')     

<div class="app-main__inner">
<div class="main-card mb-3 card">
    <div class="card-header">Brand List</div>
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
                    <th>Status</th>
                    <th >Action</th>
                    
                </tr>
            </thead>
            <tbody>
                @php ($i = 1)
                @foreach ($datas as $data)
                    @if($data->is_delete != 1)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $data->name }}</td>
                            <td><center>{{ $data->status }}</center></td>
                            <td align="center">
                                <form action="{{ route('brand.destroy',$data->id) }}" method="POST">
                
                                    <!-- <a class="btn btn-hover-shine btn-sm btn-pill btn-info" href="#">Show Products</a> -->

                                    <a class="btn btn-hover-shine btn-sm btn-pill btn-primary" style="margin-left: 5px"  href="{{ route('brand.edit',$data->id) }}">Edit</a>
                
                                    @csrf
                                    @method('DELETE')
                    
                                    <button style="margin-left: 5px" type="submit" class="btn btn-pill btn-sm btn-hover-shine btn-danger">Delete</button>
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