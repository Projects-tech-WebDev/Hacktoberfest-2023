<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Career Buddy</title>

    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!-- Bootstrap core CSS -->
    <!-- <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet"> -->
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

    <link rel="stylesheet" href="partials/sidebars.css">

</head>

<body>
    <main>
        <div class="sidebar" style="
            height:100%; 
            position:fixed;
            top: 0;
            left: 0; ">
            <?php
            include 'partials/_dbconnect.php';
            session_start();
            include 'partials/_sidebar.php';
            ?>
        </div>

        <div class=" container-1 my-2" style="position:absolute;margin:300px;">
            <?php
            $id = $_GET['catid'];
            $sql = "Select *from categories where cat_id='$id'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $title = $row['cat_title'];
                $desc = $row['cat_desc'];
            }
            echo ' 
            <div class="header" style="z-index: -1;">
                <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%"
                    data-bs-smooth-scroll="true" class="scrollspy-example bg-light my-3 p-3 rounded-2" tabindex="0" style="border:7px solid black;">
                    <h2 id="scrollspyHeading1">Welcome to
                        ' . $title . ' Discussion
                    </h2>
                    <p>
                       ' . $desc . '
                    </p>
                    <h3>Forum Rules</h3>
                    <p>Keep it friendly.</p>
                    <p>Stay on topic. </p>
                    <p> Refrain from demeaning, discriminatory, or harassing behaviour and speech.</p>
                </div>
            </div>
                    ';
            ?>
            <div class="queryform my-5">
                <?php
                if ($loggin) {
                    echo '
                <h2>Ask Your Queries here</h2>';

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $show = false;
                        $catid = $_GET['catid'];
                        $title = $_POST['doubt_title'];
                        $desc = $_POST['doubt_desc'];
                        $username = $_SESSION['username'];
                        $sql = "INSERT INTO `threads` ( `username`, `thread_title`, `thread_desc`,`cat_id`,`thread_time`) VALUES ( '
                       $username', '$title', '$desc','$catid', current_timestamp());";

                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!!</strong> Comment Added 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';

                        } else {
                            $show = "error!!";
                        }
                    }
                    echo ' <form action="' . $_SERVER["REQUEST_URI"] . '" method="post">
                    <div class="mb-3">
                        <label for="doubt" class="form-label">
                            <strong> Doubt title </strong>
                        </label>
                        <input type="text" class="form-control" id="doubt_title" name="doubt_title"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="doubt_desc" name="doubt_desc">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>';
                } else {
                    echo '
                <h2>Loggin to Ask a Doubt</h2>';
                }
                ?>
            </div>
            <div class="threads my-5">
                <h2>Discussion </h2>
                <?php
                $cid = $_GET['catid'];
                $sql = "SELECT * FROM `threads` where cat_id=$cid";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                if ($num > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['thread_id'];
                        $user = $row['username'];
                        $time = $row['thread_time'];
                        $desc = $row['thread_desc'];
                        $title = $row['thread_title'];

                        echo
                            '<div class="d-flex my-3">
                         <div class="flex-shrink-0">
                             <i class="fa-solid fa-user rounded-circle me-2" width="60" height="60"></i>
                         </div>
                         <div class=" flex-grow-1 ms-3">
                             <h4><a href="threadDes.php?threadid=' . $id . '" style="text-decoration:none; "
                                     class="text-dark">' . $user . ' </a> </h4>at ' . $time . ' <br><strong>' . $title . '</strong> <br>
                             ' . $desc . '<br>
                         </div>
                     </div>
                     <br>';
                    }
                } else if ($num == 0) {
                    echo '<div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%"
                    data-bs-smooth-scroll="true" class="scrollspy-example bg-light my-3 p-3 rounded-2" tabindex="0">Be the First One to Raise a Query</div>';
                }
                ?>
            </div>

        </div>
        </div>
    </main>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="partials/sidebars.js"></script>
</body>

</html>