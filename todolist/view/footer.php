<footer class="text-muted" style="background: #fff;">
    <div class="container">
        <p class="float-right">
            <a href="#"><img src="https://img.icons8.com/clouds/100/000000/up.png" /></a>
        </p>
        <p>Сайт &copy; Hommer Games, создан для вас с любовью!</p>
        <p>Нравится? </p>
    </div>

</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>
    window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
</script>
<script src="https://bootstrap-4.ru/docs/4.5/examples/assets/dist/js/bootstrap.bundle.min.js"></script>





<a href="#" data-toggle="modal" data-target="#exampleModal" style="position:fixed;z-index:99999;bottom:50%;right:0;width:145px;height:122px;" title="Рейтинг серверов Mu Online">
    <img src="img/banner.png" width="145" height="122" alt="Рейтинг серверов Mu Online" border="0"></a>
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
                <form action="add_server.php" method="post">
                    <div class="form-group">
                        <input type="text" name="server_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите название сервера">
                    </div>
                    <div class="form-group">
                        <input type="text" name="server_url" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Адрес сервера">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="server_description" id="exampleFormControlTextarea1" rows="3" placeholder="Описание сервера"></textarea>
                    </div>

                    <!-- <div class="form-group">
                        <select class="form-control">
                            <option>Выбор игры</option>
                            <option>Lineage II</option>
                            <option>MuOnline</option>
                            <option>WoW</option>
                        </select>
                    </div> -->

                    <div class="row">
                        <div class="form-group col-md-6">
                            <select class="form-control" name="server_version">
                                <option>Версия игры</option>
                                <option>97d-99i</option>
                                <option>S1</option>
                                <option>S2</option>
                                <option>S3</option>
                                <option>S4</option>
                                <option>S5</option>
                                <option>S6</option>
                                <option>S7</option>
                                <option>S8</option>
                                <option>S9</option>
                                <option>S10</option>
                                <option>S11</option>
                                <option>S12</option>
                                <option>S13</option>
                                <option>S14</option>
                                <option>S15</option>

                            </select> </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="server_rate" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Рейты: X100">
                        </div>
                    </div>


                    <div class="form-group">
                        <input id="datetime" name="server_dateopen" class="form-control" type="datetime-local">
                    </div>




                    <!-- <div class="form-group">
                        <label for="exampleFormControlFile1">Логотип сервера</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div> -->

                    <hr>

                    <h5 class="modal-title" id="exampleModalLabel">Контакты администратора</h5>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="text" name="server_skype" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Skype">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="server_telegram" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Telegram">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="text" name="server_vk" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="VK">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="server_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                        </div>
                    </div>


                    <!-- <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div> -->
                    <button type="submit" class="btn btn-primary">Отправить заявку</button>
                </form>
            </div>
        </div>
    </div>
</div>





</body>

</html>