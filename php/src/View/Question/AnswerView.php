<div class="block">
    <form id="form" class="form">
        <div id="alert" class="alert warning hidden">
            Incorrect answer values
        </div>
        <div class="input hidden">
            <label for="id">ID</label>
            <input id="id" type="text" name="id" class="form__input" value="<?= $question['id'] ?>">
        </div>
        <div class="block">
            <?= $question['text'] ?>
        </div>
        <div class="input">
            <label for="answer">Answer</label>
            <textarea id="answer" name="answer" class="form__input"></textarea>
        </div>
        <button id="submit" type="submit" class="form_button">Answer</button>
    </form>
</div>
