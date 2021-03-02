<ul>
    <?foreach ($data as $book):?>
    <li><?= '"' . $book['name'] . '", ' . $book['author'] ?></li>
    <?endforeach;?>
</ul>
