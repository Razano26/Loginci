
<div class="container-fluid bg-image vh-100">
    <div class="text-light">
        <div class="outer-div">
            <div class="inner-div">
                <form action="index.php" method="POST">
                    <h5 class="">Connexion</h5>
                    </br>
                    <div class="row">
                        <div class="mb-3">
                            <label for="user" class="form-label">Nom d'utilisateur</label>
                            <input type="text" class="form-control" name="user">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3">
                            <label for="pass" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" name="pass">
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a type="button" class="btn btn-warning" href="https://localhost/stats.php"><i class="bi bi-bar-chart-line-fill"></i></a>
                        <button type="submit" class="btn btn-warning">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>