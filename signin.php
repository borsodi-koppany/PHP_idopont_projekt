<h1>Fiók létrehozása!</h1>

<form method="POST" action="?todo=add">
    <div class="mb-3">
        <label for="Email" class="form-label">Email cím:</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Jelszó:</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="mb-3">
        <label for="password-again" class="form-label">Jelszó megismétlése:</label>
        <input type="password" class="form-control" id="password_again" name="password_again">
    </div>
    <div class="mb-3">
        <h6>Már van fiókod? <a href="">Bejelentkezés</a></h4>
        <button type="submit" class="btn btn-primary">Fiók létrehozása</button>
    </div>
</form>