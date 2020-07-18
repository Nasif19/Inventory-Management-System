@extends('layouts.default')

@section('content')
<div class="main-card mb-3 card">
<div class="card-header">Update Type</div>    
<div class="card-body">
    
    @if(session()->has('message'))
            <div class="alert alert-success">
                {{session()->get('message')}}
            </div>
        @endif    
    <form class="" method="POST" action="{{route('type.update',$data->id)}}">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="name" class="">{{_('Name')}}</label>
                        <input name="name" value="{{$data->name}}" id="name" placeholder="Ex: Food and Drinks...." type="text" class="form-control  @error('name') is-invalid @enderror">
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
            <center> <button class="mb-2 mr-2 btn btn-lg btn-hover-shine btn btn-primary" type="submit">{{_('Update')}}</button></center>
        </form>
    </div>
</div>

@endsection