<!DOCTYPE html>
<html lang="fr">
<?php session_start(); ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sam perf</title>
    <link href="img/logo/diapositive.png" rel="icon">
    <link rel="stylesheet" href="css/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="css/css/style-form.css">
    <script src="script/jquery/jquery.min.js"></script>
    <script src="script/script/script.js" defer></script>
</head>

<body>
    <div class="icons-switcher">
        <i class="fas fa-palette"></i>
    </div>
    <div class="color-box">
        <div class="color-switchers">
            <button class="btn-switcher principal active-color" id="principal" data-color="bleu"></button>
            <button class="btn-switcher green-switcher" id="green-switcher" data-color="vert"></button>
            <button class="btn-switcher orange-switcher" id="orange-switcher" data-color="orange"></button>
            <button class="btn-switcher purple-switcher" id="purple-switcher" data-color="violet"></button>
        </div>
    </div>
    <div class="container3D">
        <div class="parent">
            <div class="card">
                <div class="date-box">
                    <span class="month"></span>
                    <span class="date"><i class="fa fa-lock"></i></span>
                </div>
                <div class="content-box">
                    <h1 class="card-title"> Se connecter</h1>
                    <div class="container-form">
                        <form action="controller/login" method="post">
                            <div class="user-details-login">
                                <div class="input-group">
                                    <label class="label-details">Email ou Telephone</label>
                                    <div class="input-box">
                                        <span class="span-left"><i class="fa fa-envelope fa-icon"></i> </span>
                                        <input type="text" class="text-input" name="emailconnect" id="" required="required"
                                            placeholder="Email ou Telephone" value="<?php
                                                                                    if (isset($_SESSION['emailconnect'])) {
                                                                                        echo $_SESSION['emailconnect'];
                                                                                        unset($_SESSION['emailconnect']);
                                                                                    }
                                                                                    ?>">
                                    </div>
                                </div>
                                <div class="input-group">
                                    <label class="label-details">Mot de passe</label>
                                    <div class="input-box">
                                        <span class="span-left"><i class="fa fa-key fa-icon"></i></span>
                                        <input type="password" class="text-input" name="mdpconnect" id="password" required="required"
                                            placeholder="Entrer mot de passe" value="<?php
                                                                                        if (isset($_SESSION['mdpconnect'])) {
                                                                                            echo $_SESSION['mdpconnect'];
                                                                                            unset($_SESSION['mdpconnect']);
                                                                                        }
                                                                                        ?>">
                                        <span class="span-right" id="togglePassword"><i class="fa fa-eye-slash"
                                                id="show-eye"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="full-button-login">
                                <input type="submit" class="btn-full" name="login" value="Connexion">
                            </div>
                            <?php if (isset($_SESSION['message_delete'])) { ?>
                                <div class="alert-info-danger alert-info hide">
                                    <span class="alert-info-danger-msg">
                                        <span class="fas fa-exclamation-circle"></span>
                                        <span class="msg-danger">
                                            <?php
                                            echo $_SESSION['message_delete'];
                                            unset($_SESSION['message_delete']);
                                            ?>
                                        </span>
                                    </span>
                                    <div class="close-alert-info-danger close-alert-info">
                                        <span class="fas fa-times"></span>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="separator"></div>
                            <div class="foot">
                                <span><a href="register">Créer un compte |</a></span>
                                <span><a href="email_recupe">Mot de passe oublié ?</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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