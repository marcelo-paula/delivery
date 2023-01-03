<!-- visualização de cidades -->

<?php
    include 'app/view/config/header.php';
?>

<main class="form-signin w-100 m-auto">
    <form action="/delivery/state/register" method="POST">
        <h1 class="h3 mb-3 fw-normal">Cadastro de estados</h1>

        <div class="form-floating">
            <input type="text" class="form-control" id="name" name="name" placeholder="Informe o nome da cidade" required>
            <label for="name">Nome</label>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="form-floating">
                    <input type="text" class="form-control" id="uf" name="uf" placeholder="Informe a sigla" required>
                    <label for="uf">UF</label>
                </div>
            </div>
            <div class="col-md-7">
                <div class="form-floating">
                    <input type="number" class="form-control" id="ibge" name="ibge" placeholder="Informe o número do IBGE" required>
                    <label for="ibge">IBGE</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="form-floating">
                    <input type="text" class="form-control" id="ddd" name="ddd" placeholder="Informe o DDD" required>
                    <label for="ddd">DDD</label>
                </div>
            </div>
            <div class="col-md-7">
                <!-- listagem de todos os paises com a tag select -->
                <select name="pais" class="form-select" aria-label="Default select example">
                    <?php foreach($listCountry as $list): ?>
                        <option value="<?= $list['id'] ?>"><?= $list['nome'] ?></option>
                    <?php endforeach; ?>
                </select>
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

        <?php if(!empty($_GET['msg_sucess'])): ?>
            <div class="alert alert-success" role="alert"><?= $_GET['msg_sucess'] ?></div>
        <?php elseif(!empty($_GET['msg_error'])): ?> 
            <div class="alert alert-danger" role="alert"><?= $_GET['msg_error'] ?></div>
        <?php endif; ?>
    </form>
</main>

<?php
    include 'app/view/config/footer.php';
?>