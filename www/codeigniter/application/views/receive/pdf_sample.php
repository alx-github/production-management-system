<html>
<head>
    <meta http-equiv='Content-Type' content='text/html;charset=utf-8'>
    <style>
    @page { margin: 100px 25px; }
    header { position: fixed; top: -60px; left: 0px; right: 0px; background-color: lightblue; height: 50px; }
    footer { position: fixed; bottom: -60px; left: 0px; right: 0px; background-color: lightblue; height: 50px; }
    p { page-break-after: always; }
    p:last-child { page-break-after: never; }
    </style>
</head>
<body>
    <header>header on each page</header>
    <footer>footer on each page</footer>
    <main>
        <p>
            <?php for ($i=0;$i<100;$i++):?>
                record <?= $i ?>
                <br/>
            <?php endfor; ?>
        </p>
    </main>
</body>
</html>
