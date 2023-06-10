<?php
// session_start();
include('../php/manager.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/blog.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">


    <title>BLOG</title>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark" aria-label="navbar">
        <div class="container-fluid">

            <a class="navbar-brand fs-1" href="/">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-box-arrow-left" viewBox="0 0 16 16" fill="#fff">
                    <path fill-rule="evenodd"
                        d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                    <path fill-rule="evenodd"
                        d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                </svg>
            </a>
            <p class="navbar-brand fs-1" href="#" style="margin:0;">BLOG</p>
        </div>

    </nav>
    <!-- Blog Post Form -->
    <!-- <div class="post" style="display:flex;"> -->
    <div class="cart position-static d-block  py-1" tabindex="-1" role="dialog" id="modalSignin">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-2  ">
                <div class="modal-header p-5 pb-4 border-bottom-0 text-center">
                    <h1 class="fw-bold mb-0 fs-2">Add Post</h1>
                </div>
                <div class="modal-body p-5 pt-0">
                    <form method="post" id="blog_post_form">
                        <div class="form-floating mb-3">
                            <input type="text" minlength="3" class="form-control rounded-3" id="blog_user"
                                name="blog_user" placeholder="usernames">
                            <label for="floatingPassword">Alias</label>
                        </div>
                        <div class="form-outline mb-3">
                        <textarea class="form-control" id="blog_body" name="blog_body" rows="3"  placeholder="Your post goes here..."></textarea>
                        <!-- <label for="blog_body">Your post goes here...</label> -->
                        </div>
                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary sign_out_btn" type="submit">
                            Add Blog Post
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="flex-cont">
        <?php
        foreach ($allPosts as $value) {
        ?>
        <div class="flex-cards h-100">
            <div class="card card-flex shadow-sm">

                <div class="card-body">
                    <div class="card-title h-auto border-bottom text-capitalize m-0 fw-bold fs-6 job-title">
                        <?php echo htmlspecialchars($value[1]); ?>
                    </div>
                    <p class="card-text job-desc">
                        <?php echo htmlspecialchars($value[2]); ?>
                    </p>
                </div>
                <div class="card-footer d-flex justify-content-center bg-transparent job-renum">
                    <div class="d-flex">
                        <div class="container-fluid justify-content-center" role="group" aria-label="Basic example">

                            <form class="apply_form" id="">
                                <input class="job_id" value="" style="display:none;">
                                <button type="submit" class="btn bg-dark text-light add_to_cart">
                                    ^</button>
                            </form>
                        </div>
                        <div class="container-fluid justify-content-center " role="group" aria-label="Basic example">
                            <form class="apply_form" id="">
                                <input class="job_id" value="" style="display:none;">
                                <button type="submit" class="btn bg-dark text-light add_to_cart">
                                    ^</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>


        <!-- Footer -->

    </div>
</body>
<script type="module" src="../js/jquery-3.6.3.js"></script>
<script src="../js/blog-manager.js" type="module"></script>
<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

</html>