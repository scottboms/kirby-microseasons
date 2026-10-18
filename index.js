panel.plugin(`scottboms/microseasons`,{fields:{microseasons:{inheritAttrs:!1,props:{help:String,label:String,name:String,type:String,microSeason:{type:Object,default:()=>({})}},template:`
      <k-field class="k-microseasons" 
        :help="help"
        :input="false"
        :label="label"
        :name="name"
        :type="type">
          <k-box style="--width: 1/1">
            <k-text size="medium"><b>{{ microSeason['period'] }}</b> &mdash; {{ microSeason['name'] }} {{ microSeason['translation'] }} <span class="k-help">({{ microSeason['start'] }}&ndash;{{ microSeason['end'] }})</span></k-text>
          </k-box>
      </k-field>`}}});