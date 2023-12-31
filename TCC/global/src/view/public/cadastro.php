<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../src/styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <script src="../../../src/view/public/assets/js/crm.js" defer></script>
    <link rel="stylesheet" href="../src/styles/style.css">
    <title>Faça login</title>
</head>

<body>
    <div class="card-container">
        <div class="card">
            <div class="card-header">
                <h1>Cadastro</h1>
            </div>
            <form class="card-form" action="../../controllers/cadastra_Usuario.php" method="POST">
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded"></span>
                    <input type="text" name="name" placeholder="Gabriela" id="emailForm" autocomplete="off" required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded"></span>
                    <input type="text" name="sobrenome" placeholder="Silva" id="sobrenome" autocomplete="off" required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded"></span>
                    <input name="email" type="text" placeholder="email@email.com" id="emailForm" autocomplete="off" required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded"></span>
                    <input type="password" name="senha_crypt" placeholder="**********" id="senha_crypt" autocomplete="off" required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded"></span>
                    <input type="password" name="confirmation" placeholder="**********" id="confirmation" autocomplete="off" required>


                    <script src="../public/assets/js/crm.js" defer></script>

                </div>
                <input type="text" id="campo1" name="campo1" disabled placeholder="CRM">
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded"></span>
                    você é medico ? <input type="checkbox" id="habilitarCampos"> <br style="display:none">
                </div>
                <button type="submit" name="submit">Sign up</button>
                <?php
                if (isset($_GET["erro"])) {
                    if ($_GET["erro"] == 4) {
                        echo '<p class="paragraph" style="color: red !important; display: flex;
                        justify-content: center;">Email já cadastrado ! Tente novamante!</p>';
                    }
                }
                ?>
            </form>
            <script src="../../view/public/assets/js/validation.js" defer></script>
            <div class="card-footer">
                Não tem uma conta?<a href="../public/login.php"> Faça seu login.</a>
            </div>
        </div>
    </div>
</body>

</html>