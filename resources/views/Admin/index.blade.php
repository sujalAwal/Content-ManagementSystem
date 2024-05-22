@extends('layout.admin')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />
@endsection

@section('section')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Striped Table</h4>
        <p class="card-description"> Add class <code>.table-striped</code>
        </p>
        @if(! count($allData)>0)
        No post found
        @else
        <table class="table table-striped" id="myTab">
          <thead>
           
            <tr>
              <th> Image </th>
              <th> Title</th>
              <th> Description </th>
              <th>Category</th>
              <th> Status </th>
              <th class=" text-left"> Action </th>
            </tr>
          </thead>
          <tbody>
            
            @foreach ($allData as $item)
                
           
            <tr>
              <td class="py-1">
                <img src="{{ $item->gallary->image}}" alt="{{Str::limit($item->gallary->image,10)}}" />
              </td>
              <td> {{$item->title}} </td>
              <td> {{Str::limit($item->description,23)}} </td>
              <td>
                {{$item->category->name}}
              </td>
              <td>{{$item->is_publish  == 1 ? "Published" :"Draft"}}</td>
              <td class="text-left">
                <a href="{{route('admin.post.view',$item->id)}}" class="btn btn-sm btn-success"><i class="fa-solid fa-eye"></i></a>
                <a href="" class="btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
              </td>
            </tr>
           
            @endforeach
          </tbody>
        </table>
        @endif
      </div>
    </div>
  </div>
@endsection

 @section('script') 
 <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
 <script>
 $(document).ready( function () {
    $('#myTab').DataTable();
} );

 </script>

@endsection
