<div class="container">
    <h3 class="contT"><?= $contentTitle;?></h3>
    <p class="pre"><?= $preface;?></p>
    <form action="/" method="POST">
        <div><textarea class="inp"  name="text" id="text" ><?php use Core\Path; echo $textResult;?></textarea></div>
        <div><button class="but" onclick="document.getElementById('text').select(); document.execCommand('copy'); ">СКОПИРОВАТЬ</button></div>
    </form>
    <div><img class="arrow" src="<?php if ($textResult) echo '/assets/arrow.png';?>"></div>
    <div class="res"><?php if ($textResult) echo $show;?></div>
</div>
