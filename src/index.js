panel.plugin('scottboms/microseasons', {
  sections: {
    microseasons: {
      data: function () {
        return {
          microSeason: Array
        }
      },
      created: function() {
        this.load().then(response => {
          this.microSeason = response.microSeason;
        });
      },
      template: `
      <k-section class="k-microseason-section">
        <k-box style="--width: 1/1">
          <k-text size="medium"><b>{{ microSeason['period'] }}</b> &mdash; {{ microSeason['name'] }} {{ microSeason['translation'] }} <span class="k-help">({{ microSeason['start'] }}&ndash;{{ microSeason['end'] }})</span></k-text>
        </k-box>
      </k-section>`
    }
  }
});
