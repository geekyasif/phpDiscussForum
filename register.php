

<a class="btn btn-danger btn-md" href="register.php" role="button" data-toggle="modal" data-target="#registerModal"><span> <i class="fa fa-user-plus mr-2 bg-transparent" aria-hidden="true"></i> </span>Register</a>

<!-- registration Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="registerModalLabel">Register Into Iul Discuss Forum</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="handleregister.php" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="registerUsername" placeholder="Username must be Unique" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" placeholder="Enter your phone number" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter your email address" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control" name="cpassword" placeholder="Enter your confirm password" required>
                    </div>
                    <hr>
                    <button type="submit"  name="registerSubmit" class="btn btn-primary btn-block">Create My Account</button>
                </form>
            </div>
        </div>
    </div>
</div>
