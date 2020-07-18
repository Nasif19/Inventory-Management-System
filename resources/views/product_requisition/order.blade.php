@extends('layouts.defaultUser')

@section('content')   

<div class="row justify-content-center">
    <div class="col-md-12 col-lg-6 col-xl-10">
        <div class="card-shadow-primary profile-responsive card-border mb-3 card">
            <div class="dropdown-menu-header">
                <div class="dropdown-menu-header-inner bg-danger">
                    <div class="menu-header-image" style="background-image: url({{asset('storage/images/abstract1.jpg')}})"></div>
                    <div class="menu-header-content btn-pane-right">
                        <div class="avatar-icon-wrapper mr-2 avatar-icon-xl">
                            <div class="avatar-icon">                                
                                <img src="{{asset('storage/'.$data->image)}}" alt="Avatar 5">                               
                            </div>
                        </div>
                        <div><h5 class="menu-header-title">{{$data->name.' ('.$data->brand.')'}}</h5><h6 class="menu-header-subtitle">{{$data->category}}</h6></div>
                        <div class="menu-header-btn-pane">
                            <h5 class="btn-sm" style="background-color: #3ac47d">Available: {{$data->quantity.' '.$data->unit}}</h5>
                            <h5 class="btn-sm" style="background-color: #eca909">Price: {{$data->price.' BDT/'.$data->unit}}</h5>
                        </div>
                        
                    </div>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="widget-content-center">
                        <div class="widget-content-wrapper">

                            <!-- @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif -->
                            
                            <form method="POST" action="{{route('requisition.update',$data->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                        <div class="position-relative form-group">
                                            <label for="quantity" class="">{{_('Quantity')}}</label>
                                            <input name="quantity" id="quantity" value="1" type="number" step="0.01" min="1" max="{{$data->quantity}}" class="form-control @error('quantity') is-invalid @enderror">
                                            @error('quantity')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="position-relative form-group">
                                            <label for="price" class="">{{_('Price')}}</label>
                                            <input name="price" readonly id="price" placeholder="Enter per/unit Price." type="number" step="0.01" class="form-control  @error('price') is-invalid @enderror">
                                            @error('price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>    
                                <center style="margin-top: 10px"> <input class="mt-2 btn btn-primary" name="submit" type="submit" value="Submit"></center>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#quantity').on('change keyup', function(){
            var q=$('#quantity').val();
            var p = {{ $data->quantity }};
            debugger
            if(q>0 && q<=p)
                {
                    $('#price').val(q*'{{$data->price}}')
                }
            else if(q!="")
               {                    
                    $('#quantity').val(1);
                    $('#price').val('{{$data->price}}');
                    alert('Enter Valid Quantity.!');
                }
            else
                {
                    $('#price').val(0);
                }
        });
        
        $('#price').val('{{$data->price}}');
    });
</script>
@endsection