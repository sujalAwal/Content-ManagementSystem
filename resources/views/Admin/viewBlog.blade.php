@extends('layout.admin')

@section('section')
<section class="section">
    <div class="container">
      <div class="row justify-content-center">
        <div class=" col-lg-9   mb-5 mb-lg-0">
          <article>
            <pre>   @php
                $data
            @endphp
            </pre>
          
                
                <div class="post-slider mb-4">
                    <img src="{{asset('admin/'.$data->gallary->image)}}" class="max-width:80%,
                        height:auto
                      " alt="post-thumb" >
                </div>
            
            <h1 class="h2">{{$data->title}} </h1>
            <ul class="card-meta my-3 list-inline">
                <li class="list-inline-item">
                    <a href="author-single.html" class="card-meta-author">
                        <img src="images/john-doe.jpg">
                        <span>Charls Xaviar</span>
                    </a>
                </li>
                <li class="list-inline-item">
                    <i class="ti-timer"></i>2 Min To Read
                </li>
                <li class="list-inline-item">
                    <i class="ti-calendar"></i>{{$data->created_at}}
                </li>
                <li class="list-inline-item">
                    <ul class="card-meta-tag list-inline">

                       
                        {{-- @foreach ($data->category as $cat )
                            
                        <li class="list-inline-item"><a href="tags.html">{{$cat->name}}</a></li>
                        @endforeach --}}
                        <li class="list-inline-item"><a href="tags.html">{{$data->category}}</a></li>
                        <li class="list-inline-item"><a href="tags.html">Fish</a></li>
                    </ul>
                </li>
            </ul>
            <div class="content"><p>{{$data->description}}</p>
                        
                    </div>
                </article>
                
                
            </div>
          
        </div>
        
      </div>
    </div>
  </section>
    
@endsection