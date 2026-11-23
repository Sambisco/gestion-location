<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['email'])) {
    include("../include/connect.php");

    include("../include/css.php");
    include("../include/script.php");

    //------SIDEBAR--------//
    include("../include/sidebar.php");
    //------HEADER--------//
    include("../include/header.php");
    //------SCRIPT--------//

?>

    <!------MAIN-CONTENT-------->
    <input type="hidden" id="id_reference" value="<?php echo $_GET['id']; ?>">
    <div class="main-content main-content1">
        <div class="content-navigation">
            <ul class="navigation">
                <li class="active_nav active_nav_click" id="btn-modal-ajouter">
                    <a href="#">
                        <span class="icon"><i class="fas fa-fw fa-plus"></i></span>
                        <span class="text">Ajouter</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main-sous-content main-sous-content1">
            <div class="title-page">
                <h1>Utilisateur</h1>
                <ol>
                    <li><a href="#">Accueil |</a></li>
                    <li><a href="#">Utilisateur</a></li>
                </ol>
            </div>
            <div class="content-list content-list1">

            </div>
            <!----------------PAGINATION----------->
            <div class="pagination">
                <div class="showingInfo" id="showingInfo"></div>
                <div class="showingPage" id="pagination"></div>
            </div>
        </div>

    </div>
    </div>
    <!------MODAL AJOUT-------->
    <form id="insertForm">
        <div class="petit close-modal" id="ajouter-modal">
            <div class="modal-panel-petit modal-petit-3d">
                <div class="overlay-inner">
                    <div class="modal-close">
                        <span class="title">AJOUTER UTILISATEUR</span>
                        <div class="btn-close-modal close-modal">
                            <i class="fa fa-times-circle"></i>
                        </div>
                    </div>
                    <div class="container3D">
                        <div class="parent">
                            <div class="card">
                                <div class="date-box">
                                    <img src="../img/image/image-profil.jpg" alt="" id="imgPreview">
                                    <div class="round">
                                        <input type="file" name="photo" id="photo" class="file-upload">
                                        <i class="fa fa-camera"></i>
                                    </div>
                                </div>
                                <div class="content-box">
                                    <div class="container-form">
                                        <input type="text" name="id_reference" id="" value="<?php echo $_GET['id']; ?>" hidden>
                                        <div class="nextstep-update nextstep-active-update">
                                            <div class="user-details-register">
                                                <div class="input-group">
                                                    <label class="label-details">Nom complet</label>
                                                    <div class="input-box">
                                                        <span class="span-left"><i class="fa fa-user fa-icon"></i></span>
                                                        <input type="text" class="text-input nom_sub_user" name="nom_sub_user" id=""
                                                            placeholder="Nom complet" required="required" onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <label class="label-details">Telephone</label>
                                                    <div class="input-box">
                                                        <span class="span-left"><i class="fa fa-phone fa-icon"></i></span>
                                                        <input type="text" class="text-input telephone_sub_user" name="telephone_sub_user" id="id_telephone_sub_user"
                                                            placeholder="Telephone" required="required">
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <label class="label-details">Email</label>
                                                    <div class="input-box">
                                                        <span class="span-left"><i class="fa fa-envelope fa-icon"></i> </span>
                                                        <input type="text" class="text-input sub_email" name="sub_email" id="" placeholder="Email" required="required">
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <label class="label-details">Profil</label>
                                                    <div class="input-box">
                                                        <span class="span-left"><i class="fa fa-user-circle fa-icon"></i> </span>
                                                        <select name="profil" class="js-searchBox profil" required="required">
                                                            <option value="">Selectionnez un profil</option>
                                                            <option value="Administrateur">Administrateur</option>
                                                            <option value="Utilisateur">Utilisateur</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <label class="label-details">Mot de passe</label>
                                                    <div class="input-box">
                                                        <span class="span-left"><i class="fa fa-lock fa-icon"></i></span>
                                                        <input type="password" class="text-input sub_password" name="sub_password" id="password"
                                                            placeholder="Email" required="required">
                                                        <span class="span-right" id="togglePassword"><i class="fa fa-eye-slash"
                                                                id="show-eye"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="footer-modal">
                                                <button type="submit" class="footer-button-register btn-next-progress11"
                                                    id="">Enregistrer</button>
                                                <button type="button" class="footer-button-close close-modal">Fermer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!------FIN MODAL AJOUT-------->
    <!------MODAL MODIFIER-------->
    <form id="updateForm">

        <div class="petit close-modal" id="modifier-modal">
            <div class="modal-panel-petit modal-petit-3d">
                <div class="overlay-inner">
                    <div class="modal-close">
                        <span class="title">MODIFIER UTILISATEUR</span>
                        <div class="btn-close-modal close-modal">
                            <i class="fa fa-times-circle"></i>
                        </div>
                    </div>
                    <div class="container3D">
                        <div class="parent">
                            <div class="card">
                                <div class="date-box">
                                    <img src="../img/image/image-profil.jpg" alt="" id="update_imgPreview">
                                    <div class="round">
                                        <input type="file" name="photob" id="update_photo" class="file-upload">
                                        <i class="fa fa-camera"></i>
                                    </div>
                                </div>
                                <div class="content-box">
                                    <div class="container-form">
                                        <input type="text" name="edit_id" id="edit_id" hidden>
                                        <div class="nextstep-update nextstep-active-update">
                                            <div class="user-details-register">
                                                <div class="input-group">
                                                    <label class="label-details">Nom complet</label>
                                                    <div class="input-box">
                                                        <span class="span-left"><i class="fa fa-user fa-icon"></i></span>
                                                        <input type="text" class="text-input" name="nom_sub_user" id="nom_sub_user"
                                                            placeholder="Nom complet" required="required" onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <label class="label-details">Telephone</label>
                                                    <div class="input-box">
                                                        <span class="span-left"><i class="fa fa-phone fa-icon"></i></span>
                                                        <input type="text" class="text-input" name="telephone_sub_user" id="telephone_sub_user"
                                                            placeholder="Telephone" required="required">
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <label class="label-details">Email</label>
                                                    <div class="input-box">
                                                        <span class="span-left"><i class="fa fa-envelope fa-icon"></i> </span>
                                                        <input type="text" class="text-input" name="sub_email" id="sub_email" placeholder="Email" required="required">
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <label class="label-details">Profil</label>
                                                    <div class="input-box">
                                                        <span class="span-left"><i class="fa fa-user-circle fa-icon"></i> </span>
                                                        <select name="profil" id="profil" class="js-searchBox" required="required">
                                                            <option value="">Selectionnez un profil</option>
                                                            <option value="Administrateur">Administrateur</option>
                                                            <option value="Utilisateur">Utilisateur</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <label class="label-details">Mot de passe</label>
                                                    <div class="input-box">
                                                        <span class="span-left"><i class="fa fa-lock fa-icon"></i></span>
                                                        <input type="password" class="text-input" name="sub_password" id="update_password"
                                                            placeholder="Email" required="required">
                                                        <span class="span-right" id="update_togglePassword"><i class="fa fa-eye-slash"
                                                                id="update_show-eye"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="footer-modal">
                                                <button type="submit" class="footer-button-register btn-next-progress-update2"
                                                    id="inscriptdata">Modifier</button>
                                                <button type="button" class="footer-button-close close-modal">Fermer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!------FIN MODAL MODIFIER-------->
    <!------MODAL SUPPRIMER-------->
    <form id="deleteForm">
        <div class="petit close-modal" id="supprimer-modal">
            <div class="modal-panel-petit modal-petit-3d">
                <div class="overlay-inner">
                    <div class="modal-close">
                        <span class="title">SUPPRIMER Utilisateur</span>
                        <div class="btn-close-modal close-modal">
                            <i class="fa fa-times-circle"></i>
                        </div>
                    </div>
                    <div class="container3D">
                        <div class="parent">
                            <div class="card">
                                <div class="date-box">
                                    <img src="../img/image/image-profil.jpg" alt="" id="delete_imgPreview">
                                </div>
                                <div class="content-box">
                                    <div class="container-form">
                                        <input type="hidden" name="delete_id" id="delete_id">
                                        <div class="nextstep-update nextstep-active-update">
                                            <div class="user-details-login">
                                                <div class="input-group">
                                                    <label class="label-details">Voulez-vous vraiment supprimer ?</label>
                                                    <div class="input-box">
                                                        <span class="span-left"><i class="fa fa-trash"></i> </span>
                                                        <input type="text" class="text-input" name="" id="nom_del" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="footer-modal">
                                                <button type="submit" class="footer-button-register btn-next-progress-update2"
                                                    id="inscriptdata">Supprimer</button>
                                                <button type="button" class="footer-button-close close-modal">Fermer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!------FIN MODAL SUPPRIMER-------->
    <!------FOOTER-------->
    <?php
    include("../include/footer.php");
    ?>
    <script>
        function fetchdata() {
            var id = $("#id_reference").val()
            $.ajax({
                url: "../controller/user/fetch_user",
                type: "POST",
                data: {
                    id: id
                },
                success: function(response) {
                    $('.content-list1').html("");
                    var gp_data = $.parseJSON(response);
                    for (var a = 0; a < gp_data.length; a++) {
                        var div1 = `
                           <div class="parent box result well">
					<div class="card">
					    <div class="date-box">
							<img src="${gp_data[a].photo}" alt="" id="">
						</div>
						<div class="content-box">
							<h1 class="card-title">${gp_data[a].nom_sub_user}</h1>
							<div class="card-content">
								<div class="card-content-info">
									<i class="fa fa-phone fa-rotate-90"></i><span>${gp_data[a].telephone_sub_user}</span>
								</div>
								<div class="card-content-info">
									<i class="fa fa-envelope"></i><span>${gp_data[a].sub_email}</span>
								</div>
								<div class="card-content-info">
									<i class="fa fa-sort-numeric-down"></i>${gp_data[a].profil}</span>
								</div>
							</div>
                            <ul class="navigation_list">
					           <li class="active_nav_list active_nav_click_list active_nav_click_list_${gp_data[a].id_sub_users}" id="updatebtn" data-id="${gp_data[a].id_sub_users}">
					           	<a href="#">
					           		<span class="icon"><i class="fas fa-fw fa-edit"></i></span>
					           		<span class="text">Modifier</span>
									<span class="lampe"></span>
					           	</a>
					           </li>
					           <li class="active_nav_click_list active_nav_click_list_${gp_data[a].id_sub_users}" id="deletebtn" data-id="${gp_data[a].id_sub_users}">
					           	<a href="#">
					           		<span class="icon"><i class="fas fa-trash"></i></span>
					           		<span class="text">Supprimer</span>
									<span class="lampe"></span>
					           	</a>
					           </li>
				           </ul>
						</div>
					</div>
				</div>
                            `;
                        $('.content-list1').append(div1);
                    }
                    var flexiblePagination = $('.content-list1').flexiblePagination({
                        itemsPerPage: 20,
                        itemSelector: 'div.result:visible',
                        pagingControlsContainer: '#pagination',
                        showingInfoSelector: '#showingInfo',
                        css: {
                            btnNumberingClass: 'btn-primary',
                            btnFirstClass: 'btn-primary',
                            btnLastClass: 'btn-primary',
                            btnNextClass: 'btn-primary',
                            btnPreviousClass: 'btn-primary'
                        }
                    });
                    flexiblePagination.getController().onPageClick = function(pageNum, e) {
                        console.log('Cliquez sur la Page: ' + pageNum)
                    };

                    // Direct JS Object method of using the FlexiblePagination
                    //        var pager = new Flexible.Pagination();
                    //        pager.itemsPerPage = 1;
                    //        pager.pagingContainer = '#content';
                    //        pager.itemSelector = 'div.result:visible';  //That is, Select and paginate only the filtered visible '.result' div.
                    //        pager.pagingControlsContainer = '#pagingControls';
                    //        pager.showCurrentPage();
                }
            })
        }


        $('document').ready(function() {
            fetchdata()
        })

        $("#btn-modal-ajouter").click(function() {
            $("#ajouter-modal").fadeIn();
        });
        $(document).on("click", ".active_nav_click_list", function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $(".active_nav_click_list_" + id).removeClass("active_nav_list");
            $(this).addClass("active_nav_list");
        })
        $('.js-searchBox').select2({
            width: '100%'
        });

        //PHOTO
        $(document).on("change", "#photo", function() {
            var file = this.files[0];
            console.log(file);
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imgPreview').attr('src', e.target.result);
                }
                reader.readAsDataURL(file);
            }
        })
        $(document).on("change", "#update_photo", function() {
            var file = this.files[0];
            console.log(file);
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#update_imgPreview').attr('src', e.target.result);
                }
                reader.readAsDataURL(file);
            }
        })
        $(document).ready(function(e) {
            //INSERTION
            $("#insertForm").on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: '../controller/user/insert',
                    data: new FormData(this),
                    //dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        if (response === 'true') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Existe',
                                text: "L'utilisateur a déja été enregistrer.",
                                confirmButtonColor: '#127b8e',
                                showConfirmButton: false,
                                timer: 2000
                            })
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Enregistré',
                                text: "Enregistrement effectué avec succés.",
                                confirmButtonColor: '#127b8e',
                                showConfirmButton: false,
                                timer: 2000
                            });
                            fetchdata();
                        }
                    }
                });
                $("#imgPreview").attr("src", "../img/image/image-profil.jpg");
                $(this).find('input:text, input:password, input:file, textarea').val('');
                $(this).find('select').val(null).trigger('change');
                $("#ajouter-modal").fadeOut();
            });
            //UPDATE
            $("#updateForm").on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '../controller/user/update',
                    data: new FormData(this),
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        console.log(response)
                    }
                });
                $("#modifier-modal").hide();
                Swal.fire({
                    icon: 'success',
                    title: 'Modifié',
                    text: "Modification effectuée avec succés.",
                    confirmButtonColor: '#127b8e',
                    showConfirmButton: false,
                    timer: 2000
                }).then(function() {
                    fetchdata()
                });
            });
            // SUPPRIMER
            $("#deleteForm").on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '../controller/user/delete',
                    data: new FormData(this),
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('#deletedata').attr("disabled", "disabled");
                    },
                    success: function(response) {
                        console.log(response)
                    }
                });
                $("#supprimer-modal").hide();

                Swal.fire({
                    icon: 'error',
                    title: 'Supprimé',
                    text: "Suppression effectuée avec succés.",
                    confirmButtonColor: '#127b8e',
                    showConfirmButton: false,
                    timer: 2000
                }).then(function() {
                    fetchdata()
                });

            });

        });
        $("#togglePassword").on("click", function(e) {
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
        $("#update_togglePassword").on("click", function(e) {
            // toggle the type attribute
            var password = $('#update_password');
            if (password.attr("type") === "password") {
                password.attr("type", "text");
            } else {
                password.attr("type", "password");
            }
            $("#update_show-eye").toggleClass('fa-eye');
            $("#update_show-eye").toggleClass('fa-eye-slash');
            // toggle the eye icon

        });

        // SHOW UPDATE
        $(document).on('click', '#updatebtn', function(e) {

            e.preventDefault();

            var id_user = $(this).data('id');
            $.ajax({
                url: '../controller/user/fetch_user',
                type: "post",
                data: {
                    id_user: id_user
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data.logo)

                    $("#edit_id").val(data.id_sub_users);
                    $("#nom_sub_user").val(data.nom_sub_user);
                    $("#telephone_sub_user").val(data.telephone_sub_user);
                    $("#sub_email").val(data.sub_email);
                    $("#profil").val(data.profil).trigger("change");
                    $("#edit_siege").val(data.id_siege).trigger("change");
                    $("#update_imgPreview").attr("src", data.photo);
                    $("#modifier-modal").show();

                }

            });

        });
        //SHOW DELETE
        $(document).on('click', '#deletebtn', function(e) {

            e.preventDefault();

            var id_user = $(this).data('id');
            $.ajax({
                url: '../controller/user/fetch_user',
                type: "post",
                data: {
                    id_user: id_user
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data.logo)

                    $("#delete_id").val(data.id_sub_users);
                    $("#nom_del").val(data.nom_sub_user);
                    $("#delete_imgPreview").attr("src", data.photo);
                    $("#supprimer-modal").show();

                }

            });

        });
    </script>
<?php } else {
    header("Location:../");
} ?>