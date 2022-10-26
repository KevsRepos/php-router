<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/static/global.css" />
    </head>
    <body>
        <header>
            <span>Wonder's kleine Webseite</span>
            <div>
                <a href="/Gaestebuch">Gästebuch</a>
            </div>
        </header>
        <nav>
            <a href="/">Home</a>
            <a href="/About">Über mich</a>
            <a href="/Blog">Blog</a>
            <a href="/Kontakt">Kontakt</a>
            <a href="/Links">MySpace und Co.</a>
            <a href="/FAQU">FAQU</a>
        </nav>
        <main>
            <?= $slot ?>
        </main>
        <footer>
            With ❤️ by Wonder!
        </footer>
    </body>
</html>