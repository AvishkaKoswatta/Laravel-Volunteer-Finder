<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Your Forms</h1>
        <a href="{{ route('form.create') }}" class="btn btn-primary mb-3">Create New Form</a>
        <div class="row">
            <div class="col-md-8">
                <ul class="list-group">
                    <li class="list-group-item active">My Campaigns</li>
                    @foreach($forms as $form)
                        <li class="list-group-item">
                            <div class="details">
                                
                                <div class="value">
                                    <p>{{ $form->description }}</p>
                                    <p><img src="{{ Storage::url($form->image) }}" alt="Form Image" style="max-width: 100px;"></p>
                                </div>
                            </div>
                            <div class="action-buttons">
                            <button type="submit" class="btn btn-success">
                                <a href="{{ route('form.edit', $form) }}" class="edit">Edit</a>
                            </button>
                            <form action="{{ route('form.destroy', $form) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
