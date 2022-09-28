<div>
    <h1>Категории новостей</h1>

    <?php foreach($category as $item):?>
        <a href="<?=route('news.category.single', $item['slug'])?>"><?=$item['title']?></a><br><br>
    <?php endforeach;?>

</div>
