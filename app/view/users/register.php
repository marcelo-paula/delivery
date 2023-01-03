<?php
    include 'app/view/config/header.php';
?>

<main class="form-signin w-100 m-auto">
    <form action="/delivery/registerUsers/register" method="POST">
        <h1 class="h3 mb-3 fw-normal">Faça o cadastro para logar</h1>

        <div class="form-floating">
            <input type="text" class="form-control" id="name" name="name" placeholder="Informe seu nome" required>
            <label for="name">Nome completo</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" id="login" name="login" placeholder="Informe seu login" required>
            <label for="login">Login</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="password" name="password" placeholder="Informe sua senha" required>
            <label for="password">Senha</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirme sua senha" required>
            <label for="confirmPassword">Confirmar senha</label>
        </div>
        <div class="botoes">
            <button class="w-100 btn btn-outline-primary" type="submit">Cadastrar</button>
            <button class="w-100 btn btn-outline-danger" type="reset">Resetar</button>
        </div>
    </form>
</main>

<?php
    include 'app/view/config/footer.php';
?>
