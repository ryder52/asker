<div class="block">
    <div class="page">
        <div class="block block--half">
            <div>
                <h1><?= $name ?></h1>
            </div>
            <div>
                <a href="<?= \App\Service\AppService::getRoute('questionAdd', ['room' => $room])?>" type="button" class="button">Ask question</a>
            </div>
        </div>
        <?php if (empty($questions)) : ?>
            <div>No questions yet</div>
        <?php else : ?>
            <div class="questions">
                <?php foreach ($questions as $question) : ?>
                    <div class="question">
                        <div class="question__head">
                            <div class="question__head--left">
                                <?= $question['author']?>
                            </div>
                            <div class="question__head--right">
                                <div class="question__likes">
                                    <button type="button"
                                            class="form_button like"
                                            data-count="<?= $question['likes']?>"
                                            value="<?= $question['id']?>">
                                        Like <?= $question['likes']?>
                                    </button>
                                </div>
                                <div class="question__dislikes">
                                    <button type="button"
                                            class="form_button dislike"
                                            data-count="<?= $question['dislikes']?>"
                                            value="<?= $question['id']?>">
                                        Dislike <?= $question['dislikes']?>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="question__content">
                            <div class="question__content--question">
                                <?= $question['text']?>
                            </div>
                            <div class="question__content--answer">
                                <?php if (!empty($question['answer'])) : ?>
                                    <?= $question['answer'] ?>
                                <?php elseif ($isAuthor) : ?>
                                    <a href="<?= \App\Service\AppService::getRoute('questionAnswer', ['room' => $room, 'question' => $question['id']])?>"
                                       type="button" class="button">
                                        Answer
                                    </a>
                                <?php else : ?>
                                    <span class="empty">Question not answered yet</span>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
