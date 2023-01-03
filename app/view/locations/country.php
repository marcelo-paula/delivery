<!-- visualização do pais -->

<?php
    include 'app/view/config/header.php';
?>

<main class="form-signin w-100 m-auto">
    <form action="/delivery/country/register" method="POST">
        <h1 class="h3 mb-3 fw-normal">Cadastro de países</h1>

        <div class="form-floating">
            <input type="text" class="form-control" id="name" name="name" placeholder="Informe o nome do país" required>
            <label for="name">Nome</label>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="form-floating">
                    <input type="text" class="form-control" id="sigla" name="sigla" placeholder="Informe a sigla" required>
                    <label for="sigla">Sigla</label>
                </div>
            </div>
            <div class="col-md-7">
                <div class="form-floating">
                    <input type="number" class="form-control" id="bacen" name="bacen" placeholder="Informe o número do bacen" required>
                    <label for="bacen">Bacen</label>
                </div>
            </div>
        </div>
        
        <div class="botoes">
            <button class="w-100 btn btn-outline-primary" type="submit">
            <i class="fa-regular fa-square-plus"></i> Cadastrar</button>

            <button class="w-100 btn btn-outline-danger" type="reset">
            <i class="fa-sharp fa-solid fa-xmark"></i> Limpar</button>

            <button class="w-100 btn btn-outline-info">
            <i class="fa-regular fa-eye"></i> Visualizar todos</button>
        </div>
    </form>
</main>

<?php
    include 'app/view/config/footer.php';
?>