<style>
    .modal-content {
        border-radius: 10px;
    }
    .modal-header {
        background-color: #4384d7;
        color: white;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }
    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }
    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
    }
</style>

<!-- Include file koneksi.php -->
<?php include('signup.php'); ?>

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="login_process.php" method="post">
                    <div class="mb-3">
                        <label for="nimUsername" class="form-label">Masukkan NIM/Username</label>
                        <input type="text" class="form-control" id="nimUsername" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <button type="button" class="btn btn-secondary ms-2" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div>
