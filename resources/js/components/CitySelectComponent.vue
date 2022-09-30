<template>
  <div class="row">
    <div class="col">
      <div class="form-group">
        <label for="city_id">{{ $t('cities.levels[0]') }}</label>


        <select name="city_id"
                id="city_id" 
                @change="loadChildren($event.target.value)"
                class="form-control">
          <option hidden value="">{{ $t('cities.select') }}</option>
          <option v-for="city in cities.data"
                  :selected="values.includes(city.id)"
                  :value="city.id">{{ city.name }}
          </option>
        </select>
      </div>
    </div>
    <div v-for="(area, i) in children" class="col">
      <div class="form-group">
        <label :for="`city_id_${i}`">{{ $t('cities.levels.' + (i)) }}</label>
        <select name="city_id"
                :id="`city_id_${i}`"
                @change="loadChildren($event.target.value)"
                class="form-control">
          <option hidden value=""></option>
          <option v-for="city in area.data"
                  :selected="values.includes(city.id)"
                  :value="city.id">{{ city.name }}
          </option>
        </select>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    value: {
      required: false,
      type: String,
    }
  },
  data() {
    return {
      loaded: false,
      cities: {
        data: [],
      },
      values: [],
      children: [],
    }
  },
  created() {
    axios.get('/api/select/cities').then(response => {
      this.cities = response.data;
      console.log("this.cities", response.data)
    })
    if (this.value) {
      this.loadChildren(this.value);
    }
  },
  mounted(){
    console.log("HERE",this.$t(`cities`))
  },
  methods: {
    loadChildren(id) {
      if (!id) {
        this.children = [];
        return;
      }
      axios.get(`/api/select/cities/${id}`).then(response => {
        this.values = response.data.data.parents;
        this.children = response.data.data.children;
      })
    },
  }
}
</script>
