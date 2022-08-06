<nav class="navbar is-black">
    <div class="navbar-brand">
        <!--
        <a class="navbar-item" href="https://bulma.io">
          <img src="https://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
        </a>
      -->
        <a class="navbar-item">
            SUPPORTICKETS
        </a>
        <div class="navbar-burger" data-target="navbarExampleTransparentExample">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div id="navbarExampleTransparentExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="<?php echo base_url('/'); ?>">
                Inicio
            </a>
            <a class="navbar-item" href="<?php echo base_url('tickets'); ?>">
                Tickets
            </a>

            <!--<div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link" href="<?php /*echo base_url('tickets'); */?>">
                    Tickets
                </a>
                <div class="navbar-dropdown is-boxed">
                    <a class="navbar-item" href="<?php /*echo base_url('tickets'); */?>">
                        Tickets (CARDS)
                    </a>
                    <a class="navbar-item" href="<?php /*echo base_url('tickets/table'); */?>">
                        Tickets (TABULAR)
                    </a>
                    <hr class="navbar-divider">

                </div>
            </div>-->

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link" href="<?php echo base_url('categorias'); ?>">
                    Categorías
                </a>
                <div class="navbar-dropdown is-boxed">
                    <a class="navbar-item" href="<?php echo base_url('#'); ?>">
                        Módulo en construcción
                    </a>

                    <hr class="navbar-divider">
                </div>
            </div>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link" href="<?php echo base_url('kanban'); ?>">
                    Kanban
                </a>
                <div class="navbar-dropdown is-boxed">
                    <a class="navbar-item" href="<?php echo base_url('kanban'); ?>">
                        Kanban básico
                    </a>

                    <hr class="navbar-divider">

                </div>
            </div>

        </div>

        <!--
            <div class="navbar-end">
              <div class="navbar-item">
                <div class="field is-grouped">
                  <p class="control">
                    <a class="bd-tw-button button" data-social-network="Twitter" data-social-action="tweet" data-social-target="https://bulma.io" target="_blank" href="https://twitter.com/intent/tweet?text=Bulma: a modern CSS framework based on Flexbox&amp;hashtags=bulmaio&amp;url=https://bulma.io&amp;via=jgthms">
                      <span class="icon">
                        <i class="fab fa-twitter"></i>
                      </span>
                      <span>
                        Tweet
                      </span>
                    </a>
                  </p>
                  <p class="control">
                    <a class="button is-primary" href="https://github.com/jgthms/bulma/releases/download/0.9.3/bulma-0.9.3.zip">
                      <span class="icon">
                        <i class="fas fa-download"></i>
                      </span>
                      <span>Download</span>
                    </a>
                  </p>
                </div>
              </div>
            </div>
        -->

    </div>
</nav>