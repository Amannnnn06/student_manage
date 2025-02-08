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
                    <input type="text" name="search" value="<?php ($search); ?>" placeholder="Search by first name" required>

                        <button type="submit" class="btn btn-primary"><i
                                class="fa-solid fa-magnifying-glass" href="searchcode.php"></i></button>
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
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="namesort.php">Name</a></li>
                        <li><a class="dropdown-item" href="stdsort.php">STD</a></li>
                        <li><a class="dropdown-item" href="yearsort.php">Year</a></li>
                    </ul>
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
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include 'fetch_students.php'; ?>




                    </tbody>
                </table>
            </div>
            <div class="w-100 d-flex gap-1 justify-content-center mt-5">
                <a class="btn btn-sm btn-warning text-white fw-bold" href="#">&lt;&lt;</a>
                <a class="btn btn-sm btn-warning text-white fw-bold" href="#">1</a>
                <a class="btn btn-sm btn-warning text-white fw-bold" href="#">2</a>
                <a class="btn btn-sm btn-warning text-white fw-bold" href="#">3</a>
                <a class="btn btn-sm btn-warning text-white fw-bold" href="#">&gt;&gt;</a>
            </div>
        </section>
    </main>
    <div class="modal" id="newStudent">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Student Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <!-- <form class="d-flex flex-column gap-3">
                     Form fields go here
                    </form> -->
                    <form action="index.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Student ID</label>
                            <input type="number" name="std_id" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" name="f_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="l_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="user_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email ID</label>
                            <input type="email" name="email_id" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" name="dob" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Standard (Class)</label>
                            <input type="text" name="std" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gender</label>
                            <select name="gender" class="form-control" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Entry Year</label>
                            <select name="gender" class="form-control" required>
                                <option value="">Select year</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                            </select>

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Upload Image</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Insert Student</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script>
        var newStudentModal = new bootstrap.Modal(document.getElementById('newStudent'));
        document.getElementById('Addbtn').addEventListener('click', function () {
            newStudentModal.show();
        });

    </script>
    <script>
        function deleteStudent(std_id) {
            if (confirm("Are you sure you want to delete this student?")) {
                fetch("delete.php", {
                    method: "POST",
                    headers: { "Content-Type": "application/x-www-form-urlencoded" },
                    body: "std_id=" + std_id
                })
                    .then(response => response.text())
                    .then(data => {
                        alert(data);
                        location.reload(); // Refresh the page after deletion
                    })
                    .catch(error => console.error("Error:", error));
            }
        }
    </script>

</body>

</html>