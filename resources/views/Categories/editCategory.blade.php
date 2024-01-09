@extends('Master')

@section ('content')


<div class="card">
    <div class="card-header">Edit Category Name</div>
    <div class="card-body"> 
        @if ($category)
        <form action="{{ route('category.update',$category_id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method ('PUT')
            <div class="row mb-3" >
                <label class="col-sm-2 col-lable-form">Category Name</label>
                <div class="col-sm-10">
                    <input type="text" name="category_name" class="form-control" value="{{ $category->category_name }}"/>
                </div>
            </div>
            <div class="text-center">
                <input type="hidden" name="category_id" value="{{ $category_id }}" />
                <input type="submit" class="btn btn-primary" value="Update" />
            </div>
        </form>
        @endif
    </div>    
</div>

@endsection ('content')