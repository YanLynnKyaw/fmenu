@extends('Master')

@section ('content')


<div class="card">
    <div class="card-header">Edit FoodItem Name</div>
    <div class="card-body">
       
            
        @if ($fooditem)
            
        
        <form action="{{ route('fooditem.update',$fooditem_id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method ('PUT')
            <div class="row mb-3" >
                <label class="col-sm-2 col-lable-form">FoodItem Name</label>
                <div class="col-sm-10">
                    <input type="text" name="fooditem_name" class="form-control" value="{{ $fooditem->fooditem_name }}"/>
                </div>
                <label class="col-sm-2 col-lable-form">FoodItem Price</label>
                <div class="col-sm-10">
                    <input type="text" name="fooditem_price" class="form-control" value="{{ $fooditem->fooditem_price }}"/>
                </div>
            </div>
            
            
            <div class="text-center">
                <input type="hidden" name="fooditem_id" value="{{ $fooditem_id }}" />
                <input type="submit" class="btn btn-primary" value="Update" />
            </div>
        </form>
        @endif
    </div>
    
</div>

<script>

</script>

@endsection ('content')