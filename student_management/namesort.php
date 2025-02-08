<!DOCTYPE html>
<html>

<head>
    <title>Aman Vaghela (PHP)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .main {
            animation: fade-in 1s forwards;
        }

        @keyframes fade-in {
            0% {
                opacity: 0;
                transform: translateX(100px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <main class="main">
        <header class="mx-3 navbar navbar-expand bg-warning mt-3 px-3 rounded d-flex justify-content-between">
            <div class="navbar-nav">
                <div class="navbar-item input-group">
                    <form method="GET" class="d-flex">
                        <input type="text" name="search" class="form-control" placeholder="Search by First Name">
                        <button type="submit" class="btn btn-primary"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </form>

                </div>
            </div>
            <button class="btn btn-primary" id="Addbtn" data-bs-toggle="modal" data-bs-target="#newStudent">ADD
                Student</button>
        </header>
        <section class="container-fluid px-3 mt-3">
            <div class="d-flex justify-content-end p-2 rounded mb-3">
                <div class="dropdown">
                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown">
                        Sort By
                   
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="table table-success text-center table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                            <th>Email ID</th>
                            <th>DOB</th>
                            <th>STD</th>
                            <th>Gender</th>
                            <th>Entry Year</th>
                            <th>Image</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php include 'namesortcode.php'; ?>




                    </tbody>
                </table>
            </div>
           
        </section>
    </main>
    

</body>

</html>