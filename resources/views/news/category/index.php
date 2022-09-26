<div>
    <h1>Категории новостей</h1>

    <?php foreach($category as $item):?>
        <a href="<?=route('category.single', $item['id'])?>"><?=$item['title']?></a><br><br>
    <?php endforeach;?>

</div>
