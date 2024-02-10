<?php
  $currentDate = date("Y-m-d");
  $jsonSeasons = Scottboms\Microseasons\Season::getAllSeasons();
  $matchSeason = Scottboms\Microseasons\Season::getSeason($currentDate, $jsonSeasons);
?>
<<?= option('scottboms.microseasons.wrapper', 'div') ?> class="<?= option('scottboms.microseasons.class', 'microseasons') ?>">
  <dl class="ms__season">
    <dt class="ms__period"><?= $matchSeason['period'] ?></dt>
    <dd>
      <span class="ms__name">
        <?= $matchSeason['translation'] ?> 
        <?= $matchSeason['name'] ?>
      </span>
      <?php if(option('scottboms.microseasons.includedates') === True): ?>
        <time class="ms__range" datetime="<?= $matchSeason['start'] ?>/<?= $matchSeason['end']?>">
        <?= $matchSeason['start']->format(option('scottboms.microseasons.dateformat', 'M/d')) ?> to <?= $matchSeason['end']->format(option('scottboms.microseasons.dateformat', 'M/d')) ?></time> 
      <?php else: ?>
      <?php endif ?>
    </dd>
  </dl>
</div>