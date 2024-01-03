@extends('Master')

@section ('content')


<div class="card">
    <div class="card-header">Edit School Name</div>
    <div class="card-body">
       
            
        @if ($schools)
            
        
        <form action="{{ route('schools.update',$school_id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method ('PUT')
            <div class="row mb-3" >
                <label class="col-sm-2 col-lable-form">School Name</label>
                <div class="col-sm-10">
                    <input type="text" name="school_name" class="form-control" value="{{ $schools->school_name }}"/>
                </div>
            </div>
            
            
            <div class="text-center">
                <input type="hidden" name="school_id" value="{{ $school_id }}" />
                <input type="submit" class="btn btn-primary" value="Update" />
            </div>
        </form>
        @endif
    </div>
    
</div>

<script>

</script>

@endsection ('content')