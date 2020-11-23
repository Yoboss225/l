<?php
include 'CompteValidate.php';

?>
<div class="single-wrap">
    <div class="single-title">
        <div class="single-title-item">
            <h1><?= $method ?></h1>
        </div>
    </div>
    <div class="single-content">
        <div class="single-box">
            <form action="<?= $link ?>" method="post">
                <label for="<?= CompteValidate::NOM ?>">Pseudo
                    <input type="text" name="<?= CompteValidate::NOM ?>" id="<?= CompteValidate::NOM ?>" value="<?= $this->htmlesc($user->getDataId(CompteValidate::NOM)); ?>" autofocus minlength="<?= CompteValidate::MIN_LENGTH ?>" maxlength="<?= CompteValidate::MAX_LENGTH?>">
                    <span class="error"><?= $user->getErrorId(CompteValidate::NOM) ?></span>
                    <span id="exist"></span>
                </label>

                <label for="<?= CompteValidate::PASSWORD ?>">Mot de passe
                    <input type="password" name="<?= CompteValidate::PASSWORD ?>" minlength="<?= CompteValidate::MIN_LENGTH ?>" maxlength="<?= CompteValidate::MAX_LENGTH?>"
                           id="<?= CompteValidate::PASSWORD ?>"
                           value="<?= $this->htmlesc($user->getDataId(CompteValidate::PASSWORD)); ?>">
                    <span class="error"><?= $user->getErrorId(CompteValidate::PASSWORD) ?></span>
                </label>
                <div class="actions">
                    <button type="submit"><?= $validate ?></button>
                </div>
            </form>
            <?= $phrase ?>
        </div>
    </div>
</div>
