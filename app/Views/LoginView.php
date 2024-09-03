<style>
    body {
        background: linear-gradient(135deg, var(--color-background), var(--color-purple-wind), var(--color-red-wind));
        background-repeat: repeat;
        background-size: 100%;
        background-position: 50% 50%;
    }

    .contenedor {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
</style>


<div class="contenedor">
    <form action="index.php" class="object-small my-5 p-4 bg-dark rounded-3" data-bs-theme="dark" method="POST">
        <legend class="text-center mb-3 p-2 text-light">LOG IN</legend>
        <div class="input-group mb-3">
            <span class="input-group-text">User email</span>
            <input type="email" name="useremail" id="useremail" class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">User Password</span>
            <input type="password" name="userpassword" id="userpassword" class="form-control">
            <a href="#" class="btn btn-outline-secondary" type="button"><img src="public/img/visibilityOn.svg" alt=""></a>
        </div>
        <div class="text-center mb-3">
            <input type="submit" value="Log in!" class="btn btn-success" style="width: 50%;">
        </div>
    </form>
</div>