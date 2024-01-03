@extends('Master')

@section ('content')


<div class="card">
    <div class="card-header">Edit Canteen Name</div>
    <div class="card-body">
       
            
        @if ($canteens)
            
        
        <form action="{{ route('canteens.update',$canteen_id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method ('PUT')
            <div class="row mb-3" >
                <label class="col-sm-2 col-lable-form">Canteen Name</label>
                <div class="col-sm-10">
                    <input type="text" name="canteen_name" class="form-control" value="{{ $canteens->canteen_name }}"/>
                </div>
            </div>
            
            
            <div class="text-center">
                <input type="hidden" name="canteen_id" value="{{ $canteen_id }}" />
                <input type="submit" class="btn btn-primary" value="Update" />
            </div>
        </form>
        @endif
    </div>
    
</div>

<script>

</script>

@endsection ('content')