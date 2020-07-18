@extends('layouts.default')

@section('content')
<div class="main-card mb-3 card">
<div class="card-header">Add New Storage</div>    
<div class="card-body">
    
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{session()->get('message')}}
        </div>
    @endif    
    <form class="" method="POST" action="{{url()->to('store')}}">
            @csrf
            <!-- <div class="position-relative form-group">
                <label for="name" class="">{{_('Name')}}</label>
                <input name="name" id="name" placeholder="Name" type="text" class="form-control  @error('name') is-invalid @enderror">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>       -->
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="name" class="">{{_('Name')}}</label>
                        <input name="name" id="name" placeholder="" type="text" class="form-control  @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>   
                </div>
                <div class="col-md-1"></div>
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

            <div class="position-relative form-group">
                <label for="address" class="">{{_('Address')}}</label>
                <input name="address" id="address" placeholder="Address here.." type="" class="form-control @error('address') is-invalid @enderror">
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror    
            </div>
            <center> <button class="mb-2 mr-2 btn btn-lg btn-hover-shine btn btn-primary" type="submit">{{_('ADD')}}</button></center>
        </form>
    </div>
</div>

@endsection