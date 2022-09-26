<div>
    <h1>Новости из категории <br>
        <?=$category['title']?>
    </h1>

    <div>
        <?php foreach($news as $item):?>
            <a href="<?=route('news.single', $item['id'])?>"><?=$item['title']?></a><br><br>
        <?php endforeach;?>
    </div>

</div>
