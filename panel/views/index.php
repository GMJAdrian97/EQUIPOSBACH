<?php
require_once('../../componentes/header.php');
require_once('../sistema.php');
require_once('/EQUIPOSBACH/panel/views/ticketPC/mdlTicketPC.php');
?>
<section class="page-content">
    <section class="search-and-user">
        <form>
            <input type="search" placeholder="Search Pages...">
            <button type="submit" aria-label="submit form">
                <svg aria-hidden="true">
                    <use xlink:href="#search"></use>
                </svg>
            </button>
        </form>
        <div class="admin-profile">
            <span class="greeting">Hello admin</span>
            <div class="notifications">
                <span class="badge">1</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd"
                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </nav>
        </div>
    </section>
    <section class="grid">
        <article>
            <?php 
                $datosEquipos = $ticket_pc->read();
                print_r($datosEquipos);
                die();
            ?>
        <div id="chart_div" style="width: 1150px; height: auto;"></div>
        </article>
        <article></article>
        <article></article>
        <article></article>
        <article></article>
        <article></article>
        <article></article>
        <article></article>
    </section>
</section>
<?php
require_once('../../componentes/footer.php');
?>