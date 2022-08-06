<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Supportickets</title>
    <meta name="description" content="Sistema de Tickets de Soporte para Ingeniería Informática">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    <link rel="stylesheet" href="<?= base_url('assets/css/bulma.min.css') ?>">
</head>
<body>

<section class="hero is-link">
    <div class="hero-body">
        <p class="title">
            Sistema de Tickets de Soporte
        </p>
        <p class="subtitle">

        </p>
    </div>
</section>

<section class="section is-link is-medium">

    <nav class="level">

        <div class="level-item has-text-centered">
            <div>
<!--                <a href="auth/"><p class="is-size-1">Tickets</p></a>-->
                <a href="tickets" class="btn btn-link is-large">Tickets</a>
            </div>
        </div>

        <div class="level-item has-text-centered">
            <div>
                <img src="<?= base_url('assets/img/tds.png') ?>" alt="">
            </div>
        </div>


        <!--<div class="level-item has-text-centered">
            <div>
                <a href="tickets"><p class="is-size-1">Tickets</p></a>

            </div>
        </div>-->
    </nav>

</section>

<footer class="footer">
    <div class="content has-text-centered">
        <p>
            <strong>Developed by</strong> edgardegantea. <strong>#DivIINF</strong>
        </p>
    </div>
</footer>

<script>
    function toggleMenu() {
        var menuItems = document.getElementsByClassName('menu-item');
        for (var i = 0; i < menuItems.length; i++) {
            var menuItem = menuItems[i];
            menuItem.classList.toggle("hidden");
        }
    }
</script>

<!-- -->

</body>
</html>
