@extends('layouts.default')

@section('content')
<div class="main-card mb-3 card">
<div class="card-header">Add New Product</div>    
<div class="card-body">
    
    @if(session()->has('message'))
            <div class="alert alert-success">
                {{session()->get('message')}}
            </div>
        @endif    
    <form class="" method="POST" action="{{url()->to('product')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">

                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="name" class="">{{_('Name')}}</label>
                        <input name="name" id="name" placeholder="Name" type="text" class="form-control  @error('name') is-invalid @enderror">
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
                        <input name="quantity" id="quantity" placeholder="ex: 50" type="number" step="0.01" class="form-control @error('quantity') is-invalid @enderror">
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
                        <input name="price" id="price" placeholder="Enter per/unit Price." type="number" step="0.01" class="form-control  @error('price') is-invalid @enderror">
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
                        <input name="unit" id="unit" placeholder="ex: ps,KG ..." type="text" class="form-control @error('unit') is-invalid @enderror">
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
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="image" class="">{{_('Product Image')}}</label>
                        <input name="image" id="image" type="file" class="form-control-file">
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
                                <input type="radio" id="on" name="status" value="On" checked>
                                <label for="on">ON</label><br>
                                <input type="radio" id="off" name="status" value="Off">
                                <label for="off">OFF</label><br>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <center> <button class="mb-2 mr-2 btn btn-lg btn-hover-shine btn-primary" type="submit">{{_('ADD')}}</button></center>
        </form>
    </div>
</div>

@endsection