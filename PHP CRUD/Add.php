<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Add</title>
</head>
<!-- Body -->
<body class="container p-5">
    <!-- PHP -->
    <?php
    // POST METHOD
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        try{
            // Connection to DataBase
            require "./connection.php";
            $query = "INSERT INTO `proudacts`(`name`, `description`, `price`) VALUES ('$name','$description','$price')";
            $conn->query($query);
            //return directly to main page
            header("location:index.php");
        }catch(Exception $e){
            die("can't add product , " . $e->getMessage());
        }
    }
    ?>

    <!-- Form -->
    <form action="" method="post" class="form">
        <label class="form-label mt-3">name</label>
        <input type="text" name="name" class="form-control">
        <label class="form-label mt-3">description</label>
        <input type="text" name="description" class="form-control">
        <label class="form-label mt-3">price</label>
        <input type="text" name="price" class="form-control">
        <button class="btn btn-info mt-4">Add Product</button>
    </form>

</body>
</html>