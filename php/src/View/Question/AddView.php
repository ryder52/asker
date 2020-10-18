<div class="block">
    <form id="form" class="form">
        <div id="alert" class="alert warning hidden">
            Incorrect question values
        </div>
        <div class="input hidden">
            <label for="id">ID</label>
            <input id="id" type="text" name="id" class="form__input" value="<?= $room ?>">
        </div>
        <div class="input">
            <label for="name">Name</label>
            <input id="name" type="text" name="name" class="form__input">
        </div>
        <div class="input">
            <label for="text">Question</label>
            <textarea id="text" name="text" class="form__input"></textarea>
        </div>
        <button id="submit" type="submit" class="form_button">Ask</button>
    </form>
</div>
