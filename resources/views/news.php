<div>
    <h1>Новости</h1>

    <?php foreach($news as $item):?>
        <a href="<?=route('news_single', $item['id'])?>"><?=$item['title']?></a><br>
    <?php endforeach;?>

<!--    <a href="/news/one">Новость1</a>
    <a href="/news/two">Новость2</a>
    <a href="/news/three">Новость3</a>-->
</div>
