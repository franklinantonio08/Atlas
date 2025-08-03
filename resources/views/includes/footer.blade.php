<footer class="footer-custom d-flex align-items-center justify-content-between flex-wrap">
    <div class="footer-logo">
        <a href="https://www.acodeco.gob.pa/">
            <img src="{{ asset('images/logo1.png') }}" alt="Logo Acodeco" class="logo">
        </a>
    </div>

    <div class="footer-text text-center flex-fill">
        <p class="mb-0">&copy; {{ date('Y') }} <strong>New Wave Technologies</strong> — Todos los Derechos Reservados</p>
    </div>
</footer>


<style>
    .footer-custom {
        background-color: #001936;
        color: #ffffff;
        padding: 20px 40px;
        width: 100%;
        position: relative;
        z-index: 10;
        flex-shrink: 0;
    }

    .footer-logo img {
        max-height: 60px;
        width: auto;
    }

    .footer-text p {
        font-size: 1.4rem;
        font-weight: 600;
        color: #ffffff;
    }

    @media (max-width: 768px) {
        .footer-custom {
            flex-direction: column !important;
            align-items: center !important;
            text-align: center;
        }

        .footer-logo {
            margin-bottom: 10px;
        }

        .footer-text p {
            font-size: 1.1rem;
        }
    }

    /* Solo afecta la vista pública tipo kiosk o turno */
    body.sin-scroll, html.sin-scroll {
        overflow: hidden !important;
        height: 100%;
    }

    .content-page {
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .content {
        flex: 1 0 auto;
        overflow: hidden;
    }

</style>
