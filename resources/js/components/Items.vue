<template>
  <div>
    <v-app style="background-color: #D9E4EC">
      <v-container>
        <div>
          <div style="text-align: center; padding: 10px 0px;">
            <v-list-item-title class="display-3">Items</v-list-item-title>
          </div>
        </div>
        <div style="margin: 0 auto; max-width: 800px;">
          <ItemsTable :headers="headers" :items="items" />
          <!-- <table class="container">
            <tr>
              <td></td>
              <th
                v-for="(header, i) in headers"
                :key="i"
              ><img style="border-radius: 20%;" :src="header.image" alt="">
              </th>
            </tr>
            <tr
              v-for="(header, x) in headers"
              :key="x" >
              <th scope="row">
                <img style="border-radius: 20%;" :src="header.image" alt="">
              </th>
              <td
                v-for="(item, i) in results"
                :key="i"
              >
                <img style="border-radius: 20%;" :src="returnItem(item[i])" alt="">
              </td>
            </tr>
          </table> -->

        </div>
      </v-container>
    </v-app>
  </div>
</template>

<script>
import ItemsTable from './ItemsTable';

export default {
  components: {
    'ItemsTable' : ItemsTable,
  },
  data() {
    return {
      items: null,
      loading: false,
      headers: [],
      results: null,
      counter: null,
    };
  },
  created() {
    this.loading = true;
    const request = axios
      .get("/api/items")
      .then(response => {
        this.items = response.data;
        this.headers = this.items.slice(0,9);
        this.items =  this.items.slice(9);
        const result = [];
        let copy = this.items;
        // let counter = 0;
        for(let i = 1; i <= 9; i++) {
          // console.log('this is i: ', copy[i].name);
          let row = [];
          for(let z = 0; z < 9; z++) {
            // debugger;
            let item = copy[z];
            // console.log('this is z: ', copy[z].name);
            row.push(item);
            // debugger;
          }
          // copy.splice(0,9-counter);
          // for(let index = 0; index < counter; index++){
          //   copy.unshift();
          // }
          // counter++;
          result.push(row);
        }
        this.results = result;
        // const duplicatedArr = result;
        // this.results = result.concat(duplicatedArr);
        //need to duplicate array
        // console.log(this.results);
        // console.log(this.items);
        this.loading = false;
      })
  },
  methods: {
    createTableHeaders(items) {
      const result = items.map((item) => {
        return item.text = item.name;
      });
      return result;
    },
    returnItem(data) {
      // debugger;
      // console.log(data);
      // console.log(item);
      // console.log('this is the index: ', x.id);
      // console.log(i);
      // console.log(itemLength);
        // this.counter = this.counter + 1;
      // if(x >= 5 || ! i) {
      //   return;
      // }
      return data.image;
      // debugger;
      // console.log(this.counter);
    },
  },
}
</script>

<style>

</style>