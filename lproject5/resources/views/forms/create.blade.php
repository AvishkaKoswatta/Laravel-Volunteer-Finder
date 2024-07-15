<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Form</title>
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
          height: 95vh;
            background: #fff;
        }

        .content-wrapper {
            margin-top: 80px;
            display: flex;
            align-items: flex-start;
        }

        .form-container {
            width: 500px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-right: 20px;
        }

        .service-provider {
            position: relative;
            background-color: #f4c430;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 550px;
            width: 500px;
            overflow: hidden;
            margin-left: 20px;
            margin-top: -35px;
        
        }

      
        .service-provider::before, .service-provider::after {
            content: '';
            position: absolute;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            z-index: 0;
        }

        .service-provider::before {
            width: 150px;
            height: 150px;
            top: 20px;
            left: -50px;
        }

        .service-provider::after {
            width: 200px;
            height: 200px;
            bottom: -50px;
            right: -50px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: transparent;
        }

        .btn-success {
            background-color: #f4c430;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-success:hover {
            background-color: #f8d979;
        }


        img.profile{
            height: 200px;
            width: 200px;
            margin-top: -200px;
            margin-left: 90px;
        }
        .service-provider-txt{
            
            font-size: 30px;
            color: white;
            font-weight: bold;
            z-index: 1;
            margin-top: 150px;
            margin-left: -250px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content-wrapper">
            <div class="form-container">
               
                <form form action="{{ route('form.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    @method('post')
                   
                   
                   
                    <div class="form-group">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" name="description" id="description" class="form-control">
                    </div>
                    <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control-file" required>
            </div>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>

            <div class="service-provider">
            <img src="{{ asset('images/profile.png') }}" alt="Hero Image" class="profile">
    </br>
    <div class="service-provider-txt"><p>Tell Others Your Campaign</p></div>
                
            </div>
        </div>
    </div>
</body>
</html>
