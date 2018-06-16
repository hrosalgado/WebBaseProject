<?php require_once($_SERVER['DOCUMENT_ROOT'] . $_SERVER['CONTEXT_PREFIX'] . '/view/head.php'); ?>
<script src="<?php echo $_SERVER['CONTEXT_PREFIX'] ?>/resources/js/login/login.js"></script>
</head>
<body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . $_SERVER['CONTEXT_PREFIX'] . '/view/header.php'); ?>
    <section class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-4 col-md-4 col-lg-4 col-xl-4">
                <div class="form-group">
                    <label for="username">Usuario</label>
                    <input type="text" class="form-control" id="username" value="root">
                    <span class="badge badge-danger d-none" id="usernameErrorEmpty">El usuario no puede estar vacío</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-4 col-md-4 col-lg-4 col-xl-4">
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" id="password" value="root">
                    <span class="badge badge-danger d-none" id="passwordErrorEmpty">La contraseña no puede estar vacía</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-4 col-md-4 col-lg-4 col-xl-4">
                <div class="form-group">
                    <button type="button" class="btn btn-primary btn-block" id="goLogin">Entrar</button>
                </div>
            </div>
        </div>
    </section>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . $_SERVER['CONTEXT_PREFIX'] . '/view/footer.php'); ?>
</body>