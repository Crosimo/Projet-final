@extends('backoffice.indexBO')

@section('contentBO')

<div class="home-section">


<div class="slider-area" style="height: 65rem">	
    <div class="slider-wrapper">
       
        <div class="single-slide" style="background-image: url({{ asset('img/slider/'.$slider->image) }});">
            <div class="slider-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-7 col-sm-12 col-md-12">
                            <div class="text-content-wrapper">
                                <div class="text-content text-left">
                                     
                                  
                                    <p>{{ $slider->description }}</p>
                                    <a class="banner-btn" href="gallery.html" data-text="read more"><span>{{$slider->button }}</span></a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>      
    </div>
</div>  
<div class="m-12 " style="display: flex; justify-content:center; background-color: #F1F1F1;">
    <button type="button" style="margin-right:1rem" class="btn btn-primary" id="myBtna">
        Edit
    </button>
    <form action="{{ route('slider.destroy', $slider->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit">DELETE</button>
    </form>
</div>

<div id="myModal" class="modal">
    
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <form class=" " action="{{route('slider.update', $slider->id)}}" method="POST" enctype="multipart/form-data">
            
            <h1 class="text-center fs-4">
            Modifier la section</h1>
                <br>
            @if ($errors->any()) 
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            
        @endif
            @csrf
            @method('PUT')
            image: <input type="file" name="image" value="{{$slider->image}}">
            description: <input type="text" name="description" value="{{$slider->description}}">
            button: <input type="text" name="button" value="{{$slider->button}}">
            Slide Prioritaire: <input type="checkbox" name="boolean" >
            <div>
                <button class="banner-btn w-25 mt-4 block" type="submit">Submit</button>
            </div>  
        </div>
        </form>
    </div>
</div>
</div>
</div>
@endsection
