<?php
include_once __DIR__ . '/view/header.php';
?>
<main role="main" style="margin-top: 30px; margin-bottom: 30px;">
    <div class="container">
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">MU Online</h1>
                <p class="lead text-muted">Эта видеоигра понравилась 99% пользователей</p>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Добавить сервер
                </button>


                <!-- <p>
                    <a href="#" class="btn btn-primary my-2">Main call to action</a>
                    <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                </p> -->
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Добавить сервер</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row">

                    <!-- Список серверов -->
                    <div class="col-md-12">
                        <div class="card">
                            <h5 class="card-header">ТОП Сервер</h5>
                            <div class="card-body">
                                <h5 class="card-title"><img src="https://img.icons8.com/doodle/25/000000/crown--v1.png" /> ENERGYMU.RU <img src="https://img.icons8.com/plasticine/25/000000/filled-like.png" /> 2453</h5>
                                <p class="card-text">THE OPENING OF THE SERVER 5.12.2020/20:00 FOR MOSCOW TIME
                                    | Version:Season 6 ep 3
                                </p>
                                <a href="https://energymu.ru/"><img src="https://img.icons8.com/flat_round/64/000000/right--v1.png" /></a>

                            </div>

                        </div>
                    </div>
                    <div class="col-md-9" style="margin-top: 30px;">
                        <ul class="list-unstyled">
                            <li class="media">
                                <img src="https://energymu.ru/templates/new_zig_zag/images/icon-status-1.png" class="mr-3" alt="...">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1">MUDECAY.COM</h5>
                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
                                    <br><img src="https://img.icons8.com/plasticine/25/000000/filled-like.png" /> 1567
                                </div>
                                <a href="#" class="btn"><img src="https://img.icons8.com/flat_round/40/000000/right--v1.png" /></a>
                            </li>
                            <li class="media my-4">
                                <img src="https://energymu.ru/templates/new_zig_zag/images/icon-status-1.png" class="mr-3" alt="...">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1">ESCAPEMU.COM</h5>
                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
                                    <br><img src="https://img.icons8.com/plasticine/25/000000/filled-like.png" /> 877

                                </div>

                                <a href="#" class="btn"><img src="https://img.icons8.com/flat_round/40/000000/right--v1.png" /></a>

                            </li>
                            <li class="media">
                                <img src="https://energymu.ru/templates/new_zig_zag/images/icon-status-1.png" class="mr-3" alt="...">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1">UNIVERSEMU.NET</h5>
                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
                                    <br><img src="https://img.icons8.com/plasticine/25/000000/filled-like.png" /> 426
                                </div>
                                <a href="#" class="btn"><img src="https://img.icons8.com/flat_round/40/000000/right--v1.png" /></a>

                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3" style="margin-top: 30px;">
                        <div class="widget widget-tags">
                            <div class="widget-header font-size-xs mb-2"><img src="https://img.icons8.com/material-outlined/24/000000/2008.png" /> Сезоны</div>
                            <div class="tags">
                                <a class="btn btn-outline-primary font-size-xs" href="" style="margin-bottom: 5px;">Season 6 (51)</a>
                                <a class="btn btn-outline-primary font-size-xs" href="" style="margin-bottom: 5px;">Season 3 (30)</a>
                                <a class="btn btn-outline-primary font-size-xs" href="" style="margin-bottom: 5px;">Season 4 (19)</a>
                                <a class="btn btn-outline-primary font-size-xs" href="" style="margin-bottom: 5px;">97d-99i (6)</a>
                                <a class="btn btn-outline-primary font-size-xs" href="" style="margin-bottom: 5px;">Season 9 (4)</a>
                                <a class="btn btn-outline-primary font-size-xs" href="" style="margin-bottom: 5px;">Season 12 (2)</a>
                                <a class="btn btn-outline-primary font-size-xs" href="" style="margin-bottom: 5px;">Season 8 (1)</a>
                                <a class="btn btn-outline-primary font-size-xs" href="" style="margin-bottom: 5px;">Season 2 (1)</a>
                            </div>
                        </div><br>
                        <div class="widget widget-tags">
                            <div class="widget-header font-size-xs mb-2"><img src="https://img.icons8.com/wired/24/000000/connection-status-on.png" /> Рейты</div>
                            <div class="tags">
                                <a class="btn btn-outline-primary font-size-xs" href="" style="margin-bottom: 5px;">x10</a>
                                <a class="btn btn-outline-primary font-size-xs" href="" style="margin-bottom: 5px;">x50</a>
                                <a class="btn btn-outline-primary font-size-xs" href="" style="margin-bottom: 5px;">x100</a>
                                <a class="btn btn-outline-primary font-size-xs" href="" style="margin-bottom: 5px;">x1000</a>
                                <a class="btn btn-outline-primary font-size-xs" href="" style="margin-bottom: 5px;">x5000</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
<br>

<?php

include_once __DIR__ . '/view/footer.php';
?>