<?php
    include 'app/view/config/header.php';
?>

<form action="">
    <div class="login">
        <label for="txtLogin">Login</label>
        <input type="text" name="txtLogin" id="txtLogin" placeholder="Informe seu login" required>
    </div>
    <div class="senha">
        <label for="txtSenha">Senha</label>
        <input type="password" name="txtSenha" id="txtSenha" placeholder="Informe sua senha" required>
    </div>
    <div class="botoes">
        <button type="submit" class="btn btn-outline-primary">Logar</button>
        <button type="reset" class="btn btn-outline-danger">Resetar</button>
    </div>
</form>

<?php
    include 'app/view/config/footer.php';
?>
