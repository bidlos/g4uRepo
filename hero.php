<?php
require_once "views/header-small.php";

if (isset($_POST['submitBuyLvl'])) {
    echo $gameClass->minusLvlSum($_SESSION['id']);
}

$heroClass->getHero();
?>

<div class="container">
    <div class="row masthead">

<!--  heroo  -->


<div class="col-md-3">
<h3>Статы героя</h3>
<p><b>ХП - <?=$heroClass->heroShowStat('hp');?></b></p>
<form action="/hero" method="post">
<p><b>Сила - <?=$heroClass->heroShowStat('str');?></b> <button class='btn ' name="buy-str" title="Поднять характеристику за ххх"><img src="/assets/img/characters/Plus.png" alt="" style="width: 15px;"></i></button></p>
<p><b>Ловкость - <?=$heroClass->heroShowStat('agi');?></b> <button class='btn ' name="buy-agi"><img src="/assets/img/characters/Plus.png" alt="" style="width: 15px;"></i></button></p>
<p><b>Здоровте - <?=$heroClass->heroShowStat('vit');?></b> <button class='btn ' name="buy-vit"><img src="/assets/img/characters/Plus.png" alt="" style="width: 15px;"></i></button></p>
</form>

<?php
if (isset($_POST['buy-vit'])) {
    $heroClass->heroVit();
}if (isset($_POST['buy-str'])) {
    $heroClass->heroStat('str');
}if (isset($_POST['buy-agi'])) {
    $heroClass->heroStat('agi');
}

?>
<hr>
<p><h4><a href="/fight">Дуэль</a></h4></p>

</div>
<div class="col-md-6">
<h3>Ваш герой</h3>
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="row">
	<div class="col-md-3">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<p><h4>Тело</h4></p>
				<img src="/assets/img/arm/body1.jpg" alt="" title="+3 к защите" style="width: 100%;">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
				<p><h4>Оружие</h4></p>
				<img src="/assets/img/arm/sword1.jpg" alt="" title="+3 к урону" style="width: 100%;">
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
	<img src="/assets/img/characters/hero4.jpg" alt="" style="width: 100%;">
	</div>
	<div class="col-md-3">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
				<p><h4>Руки</h4></p>
				<img src="/assets/img/arm/hend1.jpg" alt="" title="+1 к защите" style="width: 100%;">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
				<p><h4>Ноги</h4></p>
				<img src="/assets/img/arm/legs1.jpg" alt="" title="+2 к защите" style="width: 100%;">
				</div>
			</div>
		</div>
	</div>
</div>
</div>
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