@extends('layouts.default')

@section('content')
<div class="main-card mb-3 card">
    <div class="card-body"><h5 class="card-title">Grid Rows</h5>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form method="POST" action="{{route('user.update',$data->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row">
            
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="name" class="">{{_('Name')}}</label>
                        <input name="name" id="name" placeholder="Name" type="text" class="form-control  @error('name') is-invalid @enderror" value="{{$data->name}}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>                        
                </div>

                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="email" class="">{{_('Email')}}</label>
                        <input name="email" id="email" placeholder="name@example.com" type="text" class="form-control @error('email') is-invalid @enderror" value="{{$data->email}}">
                        @error('email')
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
                        <label for="mobile" class="">{{_('Mobile')}}</label>
                        <input name="mobile" id="mobile" placeholder="01xxxxxxxxx" value="{{$data->mobile}}" type="" class="form-control @error('mobile') is-invalid @enderror">
                        @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror    
                    </div>
                </div>

               <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="type" class="">{{_('Type')}}</label>
                        <select name="type" id="type" type="" class="form-control @error('type') is-invalid @enderror" value="{{$data->type}}">
                            <option value="">--Select Type--</option>
                            <option value='admin'>Admin</option>
                            <option value='user'>user</option>
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
        
        document.getElementById("type").value = '{{$data->type}}';

    });
</script>
@endsection