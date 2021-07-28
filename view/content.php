<div class="container">
    <h3 class="contT"><?=$contentTitle;?></h3>
    <p class="pre"><?=$preface;?></p>
    <form action="/" method="POST">
        <div><textarea class="inp" name="text" id="text"><?=$textResult;?></textarea></div>
        <div>
            <button class="but" onclick="document.getElementById('text').select(); document.execCommand('copy'); ">
                СКОПИРОВАТЬ
            </button>
        </div>
    </form>
    <?php if ($textResult): ?>
        <div><img class="arrow" src="<?='/assets/arrow.png';?>"></div>
        <div class="res"><?=$colorView;?></div>
    <?php endif; ?>
</div>
