@extends('layouts.default')

@section('content')
<div class="main-card mb-3 card">
    <div class="card-body"><h5 class="card-title">Update Products</h5>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form method="POST" action="{{route('product.update',$data->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row">

                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="name" class="">{{_('Name')}}</label>
                        <input name="name" id="name" value="{{$data->name}}" placeholder="Name" type="text" class="form-control  @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>                        
                </div>

                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="quantity" class="">{{_('Quantity')}}</label>
                        <input name="quantity" value="{{$data->quantity}}" id="quantity" placeholder="ex: 50" type="number" class="form-control @error('quantity') is-invalid @enderror">
                        @error('quantity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="price" class="">{{_('Price')}}</label>
                        <input name="price" value="{{$data->price}}" id="price" placeholder="Enter per/unit Price." type="number" class="form-control  @error('price') is-invalid @enderror">
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>                        
                </div>

                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="unit" class="">{{_('Unit')}}</label>
                        <input name="unit" id="unit" value="{{$data->unit}}" placeholder="ex: ps,KG ..." type="text" class="form-control @error('unit') is-invalid @enderror">
                        @error('unit')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="form-row">

                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="brand" class="">{{_('Brand')}}</label>
                        <select name="brand" id="brand"  class="form-control @error('brand') is-invalid @enderror">
                            <option value="">--Select brand--</option>
                            @foreach ($brands as $brand)
                                @if($brand->status != 'off' && $brand->is_delete !=1)
                                    <option value='{{$brand->id}}'>{{$brand->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('brand')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror    
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="type" class="">{{_('Product Type')}}</label>
                        <select name="type" id="type"  class="form-control @error('type') is-invalid @enderror">
                            <option value="">--Select Product Type--</option>
                            @foreach ($types as $type)
                                @if($type->status != 'off' && $type->is_delete !=1)
                                    <option value='{{$type->id}}'>{{$type->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror    
                    </div>
                </div>
            </div>

            <div class="form-row">
                
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="category" class="">{{_('Category')}}</label>
                        <select name="category" id="category"  class="form-control @error('category') is-invalid @enderror">
                            <option value="">--Select category--</option>
                            @foreach ($categories as $category)
                                @if($category->status != 'off' && $category->is_delete !=1)
                                    <option value='{{$category->id}}'>{{$category->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror    
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="storage" class="">{{_('Product storage')}}</label>
                        <select name="storage" id="storage"  class="form-control @error('storage') is-invalid @enderror">
                            <option value="">--Select Product storage--</option>
                            @foreach ($storages as $storage)
                                @if($storage->status != 'off' && $storage->is_delete !=1)
                                    <option value='{{$storage->id}}'>{{$storage->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('storage')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror    
                    </div>
                </div>
            </div>

            <div class="form-row">               
                <div class="col-md-2">
                    <img src="{{asset('storage/'.$data->image)}}" height="100px" width="100px"/>                    
                </div>
                <div class="col-md-4">                    
                    <div class="position-relative form-group">
                        <label for="avater" class="">{{_('Image')}}</label>
                        <input name="image" id="image" type="text" class="form-control" style="display: none" value="{{$data->image}}">
                        <input name="avater" id="avater" type="file" class="form-control-file">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="position-relative ">
                        <label for="status" class="">{{_('Status')}}</label>
                        @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>    
                    <div class="container">
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                            @if($data->status == 'On')
                                    <input type="radio" id="on" name="status" value="On" checked>
                                    <label for="on">ON</label><br>
                                    <input type="radio" id="off" name="status" value="Off">
                                    <label for="off">OFF</label><br>
                                @elseif($data->status == 'Off')
                                    <input type="radio" id="on" name="status" value="On">
                                    <label for="on">ON</label><br>
                                    <input type="radio" id="off" name="status" value="Off" checked>
                                    <label for="off">OFF</label><br>
                                @else
                                    <input type="radio" id="on" name="status" value="On">
                                    <label for="on">ON</label><br>
                                    <input type="radio" id="off" name="status" value="Off">
                                    <label for="off">OFF</label><br>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <center style="margin-top: 10px"> <button class="mt-2 btn btn-primary" type="submit">{{_('Update')}}</button></center>
        </form>
    </div>
</div>

<script>
    $(document).ready(function(){
        
        document.getElementById("brand").value = '{{$data->tbl_brand_id}}';
        document.getElementById("type").value = '{{$data->tbl_type_id}}';
        document.getElementById("category").value = '{{$data->tbl_category_id}}';
        document.getElementById("storage").value = '{{$data->tbl_storage_id}}';

    });
</script>
@endsection