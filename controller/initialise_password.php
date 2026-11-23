<!DOCTYPE html>
<html lang="fr">
<?php session_start(); ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sam perf</title>
    <link href="../img/logo/Diapositive1.png" rel="icon">
    <link rel="stylesheet" href="../css/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../css/css/style-form.css">
    <script src="../script/jquery/jquery.min.js"></script>
    <script src="../script/script/script.js" defer></script>
</head>

<body>
    <div class="color-box" style="display: none;">
        <div class="icons-switcher">
            <i class="fas fa-palette"></i>
        </div>
        <div class="color-switchers">
            <button class="btn-switcher principal active-color" id="principal" data-color="bleu"></button>
            <button class="btn-switcher green-switcher" id="green-switcher" data-color="vert"></button>
            <button class="btn-switcher orange-switcher" id="orange-switcher" data-color="orange"></button>
            <button class="btn-switcher purple-switcher" id="purple-switcher" data-color="violet"></button>
        </div>
    </div>
    <div class="container-form">
        <div class="title-form">REINITIALISER !</div>
        <form action="update_password" method="post">
            <div class="user-details-login">
                <div class="input-group">
                    <label class="label-details">Email</label>
                    <div class="input-box">
                        <span class="span-left"><i class="fa fa-envelope fa-icon"></i> </span>
                        <input type="text" class="text-input" name="emailconnect" id="" required="required"
                            placeholder="Email ou Telephone" value="<?php echo $_GET["code"] ?>" readonly>
                    </div>
                </div>
                <div class="input-group">
                    <label class="label-details">Nouveau mot de passe</label>
                    <div class="input-box">
                        <span class="span-left"><i class="fa fa-lock fa-icon"></i></span>
                        <input type="password" class="text-input" name="mdpconnect" id="password" required="required"
                            placeholder="Nouveau mot de passe">
                        <span class="span-right" id="togglePassword"><i class="fa fa-eye-slash"
                                id="show-eye"></i></span>
                    </div>
                </div>
            </div>
            <div class="full-button-login">
                <input type="submit" class="btn-full" name="submit" value="Mettre a jour">
            </div>
            <?php if (isset($_SESSION['message_sucess'])) { ?>
                <div class="alert-info-succes alert-info hide">
                    <span class="alert-info-succes-msg">
                        <span class="fas fa-exclamation-circle"></span>
                        <span class="msg-succes">
                            <?php
                            echo $_SESSION['message_sucess'];
                            unset($_SESSION['message_sucess']);
                            ?>
                        </span>
                    </span>
                    <div class="close-alert-info-succes close-alert-info">
                        <span class="fas fa-times"></span>
                    </div>
                </div>
            <?php } ?>
            <hr class="separator">

        </form>
    </div>
    <script language="JavaScript">
        $(document).on("click", "#togglePassword", function(e) {
            // toggle the type attribute
            var password = $('#password');
            if (password.attr("type") === "password") {
                password.attr("type", "text");
            } else {
                password.attr("type", "password");
            }
            $("#show-eye").toggleClass('fa-eye');
            $("#show-eye").toggleClass('fa-eye-slash');
            // toggle the eye icon

        });
    </script>
</body>

</html>