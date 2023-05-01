
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        font-size: 16px;
        line-height: 1.5;
        background-color: #f8f8f8;
        margin: 0;
        padding: 0;
    }
    
    .card {
        border: 1px solid #ccc;
        border-radius: 4px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        margin: 20px auto;
        max-width: 500px;
        background-color: #fff;
    }
    
    .card-header {
        background-color: #f8f8f8;
        border-bottom: 1px solid #ccc;
        padding: 10px;
    }
    
    h5 {
        margin: 0;
        font-weight: bold;
    }
    
    .card-body {
        padding: 20px;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }
    
    .input-field {
        width: 100%;
        padding: 10px;
        border-radius: 4px;
        border: 1px solid #ccc;
        font-size: 16px;
    }
    
    .btn {
        display: inline-block;
        padding: 10px 20px;
        border-radius: 4px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        font-size: 16px;
        cursor: pointer;
        border: none;
    }
    
    .btn-primary {
        background-color: #007bff;
    }
    
    .btn:hover {
        opacity: 0.8;
    }
</style>

<body>
    
<div class="card">
    <div class="card-header">
    <h5>Reset Password</h5>
    
    <div class="card-body p-4">

    <form action="password-reset-code.php" method="POST">

    
    <div class="form-group mb-3">
        <label >Email Address</label>
        <input type="email" class="input-field" placeholder="Enter Email Address" name="email_address">
        
        <div class="form-group mb-3">
            <button type="submit" name="password_reset_link" class="btn btn-primary">Send Password Reset Link</button>
    </form>
    </div>

   
</div>
</body>
</html>