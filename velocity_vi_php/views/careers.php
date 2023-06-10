<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/careers.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

    <title>CAREERS</title>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark" aria-label="Fifth navbar example">
        <div class="container-fluid ">

            <a class="navbar-brand fs-1" href="/">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-box-arrow-left" viewBox="0 0 16 16" fill="#fff">
                    <path fill-rule="evenodd"
                        d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                    <path fill-rule="evenodd"
                        d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                </svg>
            </a>
            <p class="navbar-brand fs-1" href="#" style="margin:0;">CAREERS</p>
        </div>

    </nav>
    <!-- <form action="" class="form">
        <input type="text" class="form-name">
        <input type="text" class="form-email">
        <input type="button" class="form-button" value="submit">
    </form> -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid justify-content-center">
            <p class="navbar-brand fs-2">JOBS AVAILABLE</p>

        </div>
    </nav>
    <p></p>
    <div class="flex-cont">
        <?php
        for ($i=0; $i < 4; $i++) { 
        ?>
        <div class="flex-cards">
            <div class="card card-flex shadow-sm mb-2">
                <div class="card-body">
                    <h5 class="card-title h-auto job-title">SENIOR BACKEND DEVELOPER (REMOTE) </h5>
                    <p class="card-text h-10 card-text-sm fw-bold job-desc">Description:
                    </p>
                    <p class="card-text job-desc text-start">
                         ENVIRONMENT:

DESIGN, maintain & build server-side components as your coding expertise as a Senior 
Backend Developer is sought by an innovative Joburg Digital Tech & Marketing company 
to join its team. The ideal candidate must have proven track record delivering stable, 
fast, and secure data exchange between servers and end-users. 
This role demands excellent communication and interpersonal skills, as you will be working closely with other Backend Developers to deliver high-quality solutions. You will require 2-3 years’ experience building and maintaining software in production, 2+ years’ Node.js & [URL Removed] and proficiency in PostgreSQL, MongoDB, Docker/Kubernetes and knowledge of Service Bus Methodology. You must also have experience designing and optimising applications for high performance, high availability, and low latency & have proficiency with databases and pragmatically modelling business processes through Schema.

DUTIES:


Build sustainable coding that can be used in the future.
Collaborate with Front-end and Back-end Web Developers.
Prepare code and present them to the team.
Help establish best practices.
                    </p>


                    <div class="card-title h-auto fw-bold job-req">Requirements:</div>
                    <div class="card-title h-auto job-renum text-start">
                        Minimum 2 / 3 years of experience building and maintaining software in production.
2+ Years of Node.js and [URL Removed] of Service Bus Methodology.
Experience with PostgreSQL, MongoDB, Docker or Kubernetes.
Proficiency with databases and pragmatically modelling business processes through Schema.
Design and optimise applications for high performance, high availability, and low latency.
Familiarity with the whole web stack, including protocols and web server optimisation techniques.
Must be willing to go the extra mile & work overtime if necessary.
                    </div>
                    <div class="card-title h-auto fw-bold job-req">Renumeration:</div>
                    <div class="card-title h-auto job-renum">
                        Salary: R 18 000p/m
                    </div>
                    <div class="container-fluid">
                        <div class="column">
                            <div class="container-fluid justify-content-center " role="group"
                                aria-label="Basic example">
                                <form class="apply_form" id="">
                                    <input class="job_id" value="" style="display:none;">

                                    <button disabled type="submit" class="btn bg-dark text-light add_to_cart">
                                        APPLY</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end bg-transparent job-renum">Closing date:
                    23-08-2023</div>
            </div>
        </div> 
        <?php
        }
        ?>
   
    </div> 
    <p></p>
</body>

</html>