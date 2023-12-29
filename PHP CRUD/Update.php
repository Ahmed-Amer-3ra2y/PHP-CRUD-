<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Add</title>
</head>

<!-- Body -->
<body class="container p-5">
    <!-- PHP Code -->
    <?php
        // To Get all Data about the products and put it in input's Valus
        $id = $_GET['id'];
        // Create Connectio && Query for Read Data
        require "./connection.php";
        $query1= "SELECT `name`, `description`, `price` FROM `proudacts` WHERE id = $id ";
        $result = $conn->query($query1);
        $products = $result->fetch_all(MYSQLI_ASSOC);
        $name_value = $products[0]['name'];
        $description_value = $products[0]['description'];
        $price_value = $products[0]['price'];

        // POST METHOD
        if($_SERVER['REQUEST_METHOD']=="POST"){
            try{
                // Send the New Data
                $name = $_POST['name'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                // Query for Update
                $query = "UPDATE `proudacts` SET `name`='$name',`description`='$description',`price`='$price' WHERE id = $id";
                $conn->query($query);
                header("location:index.php");
            }catch(Exception $e){
                die("can't add product , " . $e->getMessage());
            }
        }
    ?>

    <!-- Form -->
    <form action="" method="post" class="form">
        <label class="form-label">name</label>
        <input type="text" name="name" class="form-control" <?php echo "value = '$name_value'" ?> >
        <label class="form-label">description</label>
        <input type="text" name="description" class="form-control" <?php echo "value = '$description_value'" ?>>
        <label class="form-label">price</label>
        <input type="text" name="price" class="form-control" <?php echo "value = '$price_value'" ?>>
        <button class="btn btn-lg btn-success mt-4">Update Product</button>
    </form>

</body>
</html>