<?php
include 'partials/_dbconnect.php';

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Career Buddy</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .modal-backdrop {
        z-index: -1;
    }
    </style>


    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="partials/sidebars.css">
</head>

<body>
    <main style=" max-width: 100%;">

        <div class="sidebar" style="
        z-index:2;
            height:100%; 
            position:fixed;
            top: 0;
            left: 0; ">
            <?php
            session_start();
            include 'partials/_sidebar.php';
            ?>
        </div>
        <div class="container-1  my-4" style=" display:flex;position:absolute; margin-left:300px;">
            <!-- cards -->
            <?php
                $sql = "SELECT * FROM `categories`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $title = $row['cat_title'];
                    $id = $row['cat_id'];
                    $desc = $row['cat_desc'];
                    echo '<div class=" my-2 col-md-4" style="margin:25px;"> 
           <div class=" card my-2 " style="width: 16rem;">
               <img src="https://source.unsplash.com/400x300/?job,' . $title . '" class="card-img-top" alt="...">
               <div class="card-body ">
                   <h5 class="card-title"><a style="text-decoration:none; " class="text-dark" href="threads.php?catid=' . $id . '">' . $title . '</a></h5>
                   <p class="card-text">' . substr($row['cat_desc'], 0, 40) . '....</p>
                   <a href="thread.php?catid=' . $id . '" class="btn btn-success">Read More</a>
               </div>
           </div>
       </div>';
                }
                ?>
            <!-- card end -->
        </div>

    </main>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="partials/sidebars.js"></script>
</body>

</html>