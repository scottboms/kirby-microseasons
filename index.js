window.panel.plugin("scottboms/microseasons", {
  sections: {
    microseasons: {
      data: function() {
        return {
          microSeason: null
        };
      },
      async mounted() {
        const s = await this.load();
        this.microSeason = s.microSeason;
      },
      template: `
      <k-section class="k-microseason-section">
        <k-box v-if="microSeason" style="--width: 1/1">
          <k-text size="medium"><b>{{ microSeason['period'] }}</b> &mdash; {{ microSeason['name'] }} {{ microSeason['translation'] }} <span class="k-help">({{ microSeason['start'] }}&ndash;{{ microSeason['end'] }})</span></k-text>
        </k-box>
      </k-section>`
    }
  }
});
