<div>
    <h1>Новости</h1>

    <?php foreach($news as $item):?>
        <a href="<?=route('news.single', $item['id'])?>"><?=$item['title']?></a><br><br>
    <?php endforeach;?>

</div>
