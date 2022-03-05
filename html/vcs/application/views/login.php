<style>
    .container-form {
        display: flex;
        justify-content: center;
        flex-direction: row;
        padding-top: 20px;
    }
</style>

<form action="">
    <div class="container container-form">
        <div class="card">
            <div class="card-header" style="text-align: center;">
                Login
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col">
                        <label for="username"><span class="material-icons">account_circle</span></label>
                        <input class="form-control" type="text" name="username" placeholder="Username">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="password"><span class="material-icons">password</span></label>
                        <input class="form-control" type="text" name="password" placeholder="Password">
                    </div>
                </div>
            </div>
            <div class="card-footer" style="text-align: right;">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>

        </div>
    </div>

</form>