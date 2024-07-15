@extends('auth.layout')

@section('content')
<div class="container">
    <div class="content-wrapper">
        <form class="login-form" action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <div class="service-provider">
            <p>Log In To Continue</p>
        </div>
    </div>
</div>

<style>
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .content-wrapper {
        margin-top: 80px;
        display: flex;
        align-items: flex-start;
    }

    .registration-form, .login-form {
        width: 500px;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-right: 20px; /* Add some space between the form and the yellow box */
    }

    .service-provider {
        position: relative;
        background-color: #ffeb3b; /* Yellow color */
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        height: 550px;
        width: 500px;
        overflow: hidden; /* To hide overflowing pseudo-elements */
        margin-top: -95px;
        margin-left: 100px;
    }

    .service-provider p {
        margin: 0;
        font-size: 30px;
        color: white;
        font-weight: bold;
        z-index: 1; /* Ensure text is above the shapes */
    }

    .service-provider::before, .service-provider::after {
        content: '';
        position: absolute;
        background: rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        z-index: 0; /* Ensure shapes are behind the text */
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
</style>
@endsection
