<div class="block">
    <div class="page">
        <div class="block">
            <h1>Asker</h1>
        </div>
        <div class="block block--half">
            <div>
                <div class="input">
                    <label for="id">ID</label>
                    <input id="id" type="text" name="id" class="form__input" placeholder="Room ID">
                </div>

                <button id="connect" type="button" class="form_button">Connect</button>
            </div>
            <?php if (\App\Service\AppService::isLogged()) : ?>
                <div>
                    <div class="input">
                        <label for="name">Name</label>
                        <input id="name" type="text" name="name" class="form__input" placeholder="Room name">
                    </div>

                    <button id="create" type="button" class="form_button">Create</button>
                </div>
            <?php else : ?>
                <div>
                    Login/Register to create new room
                </div>
            <?php endif; ?>
        </div>
        <?php if (isset($rooms) && !empty($rooms)) : ?>
            <h2>Your rooms</h2>
            <div class="block">
                <?php foreach ($rooms as $room) : ?>
                    <div class="room">
                        <a href="<?= \App\Service\AppService::getRoute('roomDetail', ['room' => $room['id']]) ?>" class="link">
                            <?= $room['name'] ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <h2>You didn't create any rooms yet</h2>
        <?php endif; ?>
    </div>
</div>




