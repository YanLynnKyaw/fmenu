<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Create FoodItem</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        FoodItem Creation
                    </div>
                    <div class="card-body">
                        @if ($category)
                           
                        
                        <form action="{{ route('fooditem.store',['category_id' => $category_id]) }}" method="POST">
                            @csrf
                            @method('post')
                            <div class="form-group">
                                <label for="name">FoodItem Name:</label>
                                <input type="text" name="fooditem_name" id="fooditem_name" class="form-control" required>
                                <label for="name">FoodItem Price:</label>
                                <input type="text" name="fooditem_price" id="fooditem_price" class="form-control" required>
                            
                            </div>

                            <button type="submit" class="btn btn-primary">Create FoodItem</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>