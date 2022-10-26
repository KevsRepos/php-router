<h1>Willkommen bei meinem schnieken Webauftritt :)))</h1>

<article>
    <p>
        Hallo <strong>Besucher!</strong> Hier auf meiner Homepage erfährst du alles über mich :-)<br />
        Schau dich doch mal etwas um und genieß die Zeit hier. Nimm dir einen Tee und einen Keks aus der Keksdose ->
        <img src="static/images/keksdose.png" width="80" />
    </p>
    <p>
        Wenn Du magst, kannst Du mir ein "Like" hinterlassen (Aber nur wenn du magst) hehe.<br />
        Wenn Du mal Lust hast kannst du auch mit mir chatten auf MySpace oder ICQ, Infos dazu findes du -> <a href="Links">hier.</a> <-<br />
        Ich wünsche dir noch viel Spaß und Unterhaltung!<br /><br />
        Lass auch unbedingt einen Eintrag in meinem Gästebuch da!!!<br /><br />
        Und nicht zu viel Kekse wegfuttern hehe :))
    </p>
</article>

<div>
    Besucher Counter: <?= rand(0, 2000) ?>
</div>

<div>
    Likes: <span id="likes"><?= rand(0, 240) ?></span> <button class="like-btn"><img src="static/images/like.png" width="50"/></button>
</div>

<script defer>
const likes = document.querySelector('#likes');
document.querySelector('button').addEventListener('click', () => {
    likes.textContent = Number(likes.textContent) + 1;
})
</script>