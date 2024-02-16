<?php
  $currentDate = Scottboms\Microseasons\Season::getCurrentDate();
  $jsonSeasons = Scottboms\Microseasons\Season::getAllSeasons();
  $matchSeason = Scottboms\Microseasons\Season::getSeason($currentDate, $jsonSeasons);
?>
<<?= $matchSeason['wrapper'] ?> class="<?= $matchSeason['class'] ?>">
  <dl class="ms__season">
    <dt class="ms__period"><?= $matchSeason['period'] ?></dt>
    <dd>
      <span class="ms__name">
        <?= $matchSeason['translation'] ?> 
        <?= $matchSeason['name'] ?>
      </span>
      <?php if($matchSeason['includedates'] === True): ?>
        <time class="ms__range" datetime="<?= $matchSeason['start'] ?>/<?= $matchSeason['end']?>">
        <?= $matchSeason['start'] ?> to <?= $matchSeason['end'] ?></time> 
      <?php endif ?>
    </dd>
  </dl>
</<?= $matchSeason['wrapper'] ?>>