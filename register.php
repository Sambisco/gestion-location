<!DOCTYPE html>
<html lang="fr">
<?php session_start(); ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="img/logo/Diapositive1.png" rel="icon">
    <link rel="stylesheet" href="css/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="css/css/style-form.css">
    <script src="script/jquery/jquery.min.js"></script>
    <script src="script/script/script.js" defer></script>
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
    <div class="container3D">
        <div class="parent">
            <div class="card">
                <div class="date-box">
                    <span class="month"></span>
                    <span class="date"><i class="fa fa-key"></i></span>
                </div>
                <div class="content-box">
                    <h1 class="card-title">S'inscrire</h1>
                    <div class="container-form">
                        <form action="controller/register" method="post">
                            <div class="user-details-login">
                                <div class="input-group">
                                    <label class="label-details">Nom complet</label>
                                    <div class="input-box">
                                        <span class="span-left"><i class="fa fa-user fa-icon"></i></span>
                                        <input type="text" class="text-input" style="text-transform: capitalize;" name="nom" id="" placeholder="Entrer nom complet"
                                            required="required">
                                    </div>
                                </div>
                                <div class="input-group">
                                    <label class="label-details">Telephone</label>
                                    <div class="input-box">
                                        <span class="span-left"><i class="fa fa-phone fa-icon"></i> </span>
                                        <input type="text" class="text-input" name="telephone" id="" placeholder="Entrer telephone"
                                            required="required">
                                    </div>
                                </div>

                                <div class="input-group">
                                    <label class="label-details">Email</label>
                                    <div class="input-box">
                                        <span class="span-left"><i class="fa fa-envelope fa-icon"></i> </span>
                                        <input type="text" class="text-input" name="emailconnect" id="" placeholder="Entrer email"
                                            required="required">
                                    </div>
                                </div>
                                <div class="input-group">
                                    <label class="label-details">Mot de passe</label>
                                    <div class="input-box">
                                        <span class="span-left"><i class="fa fa-lock fa-icon"></i></span>
                                        <input type="password" class="text-input" name="mdpconnect" id="password"
                                            placeholder="Entrer mot de passe" required="required">
                                        <span class="span-right" id="togglePassword"><i class="fa fa-eye-slash"
                                                id="show-eye"></i></span>
                                    </div>
                                </div>

                            </div>

                            <div class="full-button">
                                <input type="submit" class="btn-full" name="register" value="Inscription">
                            </div>
                            <?php if (isset($_SESSION['message_delete'])) { ?>
                                <div class="alert-info hide">
                                    <span class="alert-info-msg">
                                        <span class="fas fa-exclamation-circle"></span>
                                        <span class="msg">
                                            <?php
                                            echo $_SESSION['message_delete'];
                                            unset($_SESSION['message_delete']);
                                            ?>
                                        </span>
                                    </span>
                                    <div class="close-alert-info">
                                        <span class="fas fa-times"></span>
                                    </div>
                                </div>
                            <?php } ?>
                            <hr class="separator">
                            <div class="foot">
                                <span><a href="index">Se connecter</a></span>
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
        $(document).on("click", "#togglePassword-conf", function(e) {
            // toggle the type attribute
            var password = $('#password-conf');
            if (password.attr("type") === "password") {
                password.attr("type", "text");
            } else {
                password.attr("type", "password");
            }
            $("#show-eye-conf").toggleClass('fa-eye');
            $("#show-eye-conf").toggleClass('fa-eye-slash');
            // toggle the eye icon
        });
    </script>
</body>

</html>