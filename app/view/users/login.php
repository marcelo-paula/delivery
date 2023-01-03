<?php
    include 'app/view/config/header.php';
?>

<main class="form-signin w-100 m-auto">
    <form action="/delivery/users/login" method="POST">
        <h1 class="h3 mb-3 fw-normal">Faça login para acessar</h1>

        <div class="form-floating">
            <input type="text" class="form-control" id="login" name="login" placeholder="Informe seu login" required>
            <label for="login">Login</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="password" name="password" placeholder="Informe sua senha" required>
            <label for="password">Senha</label>
        </div>
        
        <button class="w-100 btn btn-outline-primary" type="submit">Logar</button>
    </form>
</main>

<?php
    include 'app/view/config/footer.php';
?>
