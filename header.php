<div class="bs-example">
    <nav class="navbar navbar-default" id="navbar-main">
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="Principal.php" class="navbar-brand">GYM-UTN</a>
        </div>
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="Principal.php">Inicio</a></li>
                <li><a href="index.php">Salir</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if ($navbarId == 0) {
                    ?>
                    <li><a href="#"><img id="image-profile" src="imagenes/logo.gif" class="img-circle special-img" alt="profile" width="35px" height="35px"></a></li>
                    <?php
                } else {
                    ?>
                    <li><a href="#"><img id="image-profile" src="data:image/jpeg;base64,<?php echo base64_encode($navbarFoto); ?>" class="img-circle special-img" alt="profile" width="35px" height="35px"></a></li>
                    <?php
                }
                ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"> <?php echo $navbarUsuario; ?> </a></li>
            </ul>
        </div>
    </nav>
</div>