<?php require_once($_SERVER['DOCUMENT_ROOT'] . $_SERVER['CONTEXT_PREFIX'] . '/view/head.php'); ?>
<script src="<?php echo $_SERVER['CONTEXT_PREFIX'] ?>/resources/js/logout/logout.js"></script>
</head>
<body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . $_SERVER['CONTEXT_PREFIX'] . '/view/header.php'); ?>
    <section class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-4 col-md-4 col-lg-4 col-xl-4">
                <h1>Hey!</h1>
                <button type="button" class="btn btn-danger btn-block" id="goLogout">Salir</button>
            </div>
        </div>
    </section>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . $_SERVER['CONTEXT_PREFIX'] . '/view/footer.php'); ?>
</body>