<?php
include_once __DIR__ . '/view/header.php';
?>
<main role="main" style="margin-top: 30px; margin-bottom: 30px;">
    <div class="container">
        <nav id="navbar-example3" class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <nav class="nav nav-pills flex-column">
                <a class="nav-link" href="#item-1">Пункт 1</a>
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link ml-3 my-1" href="#item-1-1">Пункт 1-1</a>
                    <a class="nav-link ml-3 my-1" href="#item-1-2">Пункт 1-2</a>
                </nav>
                <a class="nav-link" href="#item-2">Item2</a>
                <a class="nav-link" href="#item-3">Item3</a>
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link ml-3 my-1" href="#item-3-1">Пункт 3-1</a>
                    <a class="nav-link ml-3 my-1" href="#item-3-2">Пункт 3-2</a>
                </nav>
            </nav>
        </nav>

        <div data-spy="scroll" data-target="#navbar-example3" data-offset="0">
            <h4 id="item-1">Пункт 1</h4>
            <p>...</p>
            <h5 id="item-1-1">Пункт 1-1</h5>
            <p>...</p>
            <h5 id="item-1-2">Пункт 2-2</h5>
            <p>...</p>
            <h4 id="item-2">Пункт 2</h4>
            <p>...</p>
            <h4 id="item-3">Пункт 3</h4>
            <p>...</p>
            <h5 id="item-3-1">Пункт 3-1</h5>
            <p>...</p>
            <h5 id="item-3-2">Пункт 3-2</h5>
            <p>...</p>
        </div>
    </div>
</main>
<br>

<?php
include_once __DIR__ . '/view/footer.php';
?>