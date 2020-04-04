<template>
  <table>
    <tr >
      <td></td>
      <th
        v-for="header in headers"
        :key="header.id"
      >
        <v-avatar
          style="border-radius: 4px"
          alt=""
          tile
          size=60
          class="ma-1"
        >
          <v-img :src="header.image"></v-img>
        </v-avatar>
      </th>
    </tr>
    <template
      v-for="(header,i) in headers"
    >
      <tr :key="i">
        <th>
          <v-avatar
            style="border-radius: 4px"
            alt=""
            tile
            size=60
            class="ma-1"
          >
            <v-img :src="header.image"></v-img>
          </v-avatar>
        </th>
        <!--
          have to use results[i] because we need the arrays nested inside results
          each array is a row
        -->
        <td v-for="(item, x) in results[i]" :key="x">
          <v-avatar
            style="border-radius: 4px"
            alt=""
            tile
            size=60
            class="ma-1"
          >
            <v-img :src="item.image"></v-img>
          </v-avatar>
        </td>
      </tr>
    </template>
  </table>
</template>

<script>
export default {
  data() {
    return {
      column1: [],
      column2: [],
      column3: [],
      column4: [],
      column5: [],
      column6: [],
      column7: [],
      column8: [],
      column9: [],
      results: null,
    };
  },
  props: {
    headers: {
      type: Array,
    },
    items: {
      type: Array,
    },
  },
  // not sure if this is the best place to put this
  // todo: look into if this is best-practice
  beforeUpdate() {
    this.handleDblHeaderItems(this.items);
  },
  methods: {
    handleDblHeaderItems(items) {
      const result = [];
      let counter = 0;
      let copy = items;
      for(let i = 1; i <= 9; i++) {
        let row = [];
        for(let z = 0; z < 9 - counter; z++) {
          let item = copy[z];
          row.push(item);
        }
        copy.splice(0,9-counter);
        if(i === 1){

        } else if(i === 2) {
          this.column1 = result[0].slice(i-1,i);
          //giant slayer
          const item = Object.assign({}, ...this.column1 );
          row.unshift(item);

        } else if(i === 3) {
          //3rd item from column1 (guardian angel)
          this.column1 = result[0].slice(i-1,i);
          //grab 2nd item from column2 (Titans Resolve)
          this.column2 = result[1].slice(i-1,i);
          const item = Object.assign({}, ...this.column1 );
          const item2 = Object.assign({}, ...this.column2 );
          row.unshift(item, item2);

        } else if(i === 4) {
          //4th item from column1 (Blood Thirster)
          this.column1 = result[0].slice(i-1,i);
          //grab 4th item from column2 (Runaans)
          this.column2 = result[1].slice(i-1,i);
          //grab 2nd item from column3 (Sword breaker)
          this.column3 = result[2].slice(i-1,i);
          const item = Object.assign({}, ...this.column1 );
          const item2 = Object.assign({}, ...this.column2 );
          const item3 = Object.assign({}, ...this.column3 );
          row.unshift(item, item2,item3);

        } else if(i === 5) {
          //5th item from column1 (Hextech)
          this.column1 = result[0].slice(i-1,i);
          //grab 5th item from column2 (Guinsoo)
          this.column2 = result[1].slice(i-1,i);
          //grab 5th item from column3 (Locket)
          this.column3 = result[2].slice(i-1,i);
          //grab 5th item from column4 (Iconic Spark)
          this.column4 = result[3].slice(i-1,i);
          const item = Object.assign({}, ...this.column1 );
          const item2 = Object.assign({}, ...this.column2 );
          const item3 = Object.assign({}, ...this.column3 );
          const item4 = Object.assign({}, ...this.column4 );
          row.unshift(item, item2,item3, item4);

        } else if(i === 6) {
          //6th item from column1 (Sojin)
          this.column1 = result[0].slice(i-1,i);
          //grab 6th item from column2 (Statik Shiv)
          this.column2 = result[1].slice(i-1,i);
          //grab 6th item from column3 (Frozen Heart)
          this.column3 = result[2].slice(i-1,i);
          //grab 6th item from column4 (Chalice)
          this.column4 = result[3].slice(i-1,i);
          //grab 6th item from column5 (Ludens)
          this.column5 = result[4].slice(i-1,i);
          const item = Object.assign({}, ...this.column1 );
          const item2 = Object.assign({}, ...this.column2 );
          const item3 = Object.assign({}, ...this.column3 );
          const item4 = Object.assign({}, ...this.column4 );
          const item5 = Object.assign({}, ...this.column5 );
          row.unshift(item, item2,item3, item4, item5);

        } else if(i === 7) {
          //7th item from column1 (Zekes)
          this.column1 = result[0].slice(i-1,i);
          //grab 7th item from column2 (Zzrot)
          this.column2 = result[1].slice(i-1,i);
          //grab 7th item from column3 (Red Buff)
          this.column3 = result[2].slice(i-1,i);
          //grab 7th item from column4 (Zheypr)
          this.column4 = result[3].slice(i-1,i);
          //grab 7th item from column5 (Morello)
          this.column5 = result[4].slice(i-1,i);
          //grab 7th item from column5 (Redemption)
          this.column6 = result[5].slice(i-1,i);
          const item = Object.assign({}, ...this.column1 );
          const item2 = Object.assign({}, ...this.column2 );
          const item3 = Object.assign({}, ...this.column3 );
          const item4 = Object.assign({}, ...this.column4 );
          const item5 = Object.assign({}, ...this.column5 );
          const item6 = Object.assign({}, ...this.column6 );
          row.unshift(item, item2,item3, item4, item5, item6);

        } else if(i === 8) {
          //8th item from column1 (bork)
          this.column1 = result[0].slice(i-1,i);
          //grab 8th item from column2 (infiltrator)
          this.column2 = result[1].slice(i-1,i);
          //grab 8th item from column3 (Rebel)
          this.column3 = result[2].slice(i-1,i);
          //grab 8th item from column4 (celestial)
          this.column4 = result[3].slice(i-1,i);
          //grab 8th item from column5 (demo)
          this.column5 = result[4].slice(i-1,i);
          //grab 8th item from column5 (star guardian)
          this.column6 = result[5].slice(i-1,i);
          //grab 8th item from column5 (protector)
          this.column7 = result[6].slice(i-1,i);
          const item = Object.assign({}, ...this.column1 );
          const item2 = Object.assign({}, ...this.column2 );
          const item3 = Object.assign({}, ...this.column3 );
          const item4 = Object.assign({}, ...this.column4 );
          const item5 = Object.assign({}, ...this.column5 );
          const item6 = Object.assign({}, ...this.column6 );
          const item7 = Object.assign({}, ...this.column7 );
          row.unshift(item, item2,item3, item4, item5, item6, item7);
        
        } else if(i === 9) {
          //9th item from column1 (ie)
          this.column1 = result[0].slice(i-1,i);
          //grab 9th item from column2 (lw)
          this.column2 = result[1].slice(i-1,i);
          //grab 9th item from column3 (shroud)
          this.column3 = result[2].slice(i-1,i);
          //grab 9th item from column4 (quicksilver)
          this.column4 = result[3].slice(i-1,i);
          //grab 9th item from column5 (jewled)
          this.column5 = result[4].slice(i-1,i);
          //grab 9th item from column5 (hoj)
          this.column6 = result[5].slice(i-1,i);
          //grab 9th item from column5 (shield)
          this.column7 = result[6].slice(i-1,i);
          //grab 9th item from column5 (dark star)
          this.column8 = result[7].slice(i-1,i);
          const item = Object.assign({}, ...this.column1 );
          const item2 = Object.assign({}, ...this.column2 );
          const item3 = Object.assign({}, ...this.column3 );
          const item4 = Object.assign({}, ...this.column4 );
          const item5 = Object.assign({}, ...this.column5 );
          const item6 = Object.assign({}, ...this.column6 );
          const item7 = Object.assign({}, ...this.column7 );
          const item8 = Object.assign({}, ...this.column8 );
          row.unshift(item, item2,item3, item4, item5, item6, item7, item8);
        }
        counter++;
        result.push(row);
      }
      this.results = result;
    },
  },
}
</script>

<style>

</style>