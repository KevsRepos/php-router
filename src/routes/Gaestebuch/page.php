<a href="/Gaestebuch/Eintrag">Hier einen Eintrag machen</a>

<article id="gaestebuch">
    <?php foreach($data as $entry): ?>
        <div>
            <h3>Von: <?= $entry['name'] ?></h3>
            <div><?= $entry['text'] ?></div>
        </div>
        <hr />
    <?php endforeach ?>
</article>