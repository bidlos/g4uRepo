<?php
require_once "views/header-small.php";
require_once "function/fight.php";

$fightsClass->newFight();
?>

<div class="container">
  <div class="row masthead">

    <!--  heroo  -->

    <div class="col-md-3">
      <h3>Герой</h3>
      <img src="/assets/img/characters/hero4.jpg" alt="" style="width: 100%;">

    </div>
    <div class="col-md-6">
      <h3>Бой</h3>
      <p><b>ХП - <?=$heroClass->heroShowStat('hp');?></b>
      <b>Сила - <?=$heroClass->heroShowStat('str');?></b>
      <b>Ловкость - <?=$heroClass->heroShowStat('agi');?></b>
      <b>Здоровте - <?=$heroClass->heroShowStat('vit');?></b> </p>

      <div class="row">
        <div class="col-md-6">


          <form action="#" method="post">

            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <input type="radio" name="punch" value="голове">
                </div>
              </div>Ударить в голову
            </div><br>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <input type="radio" name="punch" value="телу">
                </div>
              </div>Ударить в корпус
            </div><br>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <input type="radio" name="punch" value="ногам">
                </div>
              </div>Ударить по ногам
            </div>

            <br>

        </div>

        <div class="col-md-6">

          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <input type="radio" name="block" value="голове">
              </div>
            </div>Защита головы
          </div><br>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <input type="radio" name="block" value="телу">
              </div>
            </div>Защита корпуса
          </div><br>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <input type="radio" name="block" value="ногам">
              </div>
            </div>Защита ног
          </div>

        </div>
      </div>
      <button type="submit" name="doPunch" class="btn btn-danger">Ударить</button>
      </form>

      <!-- Бой с ботом -->
      <div class="row">
        <div class="col-md-12">
        <?php
if (isset($_POST['punch'])) {

    // echo $fightsClass->userDoIt();
    echo $fightsClass->fightResult('user', 'bot') . '<br>';    
    echo $fightsClass->fightResult('bot', 'user') . '<br>';

}
?>
        </div>
      </div>
    </div>

    <!--  heroo  -->
    <div class="col-md-3">
      <div class="list-group">

        <?php $gameMenuClass->rightMenu($_SESSION['id']);?>
      </div>
    </div>

  </div>
</div>

<?php
require_once "views/footer.php";
?>