<script>
import axios from 'axios';

export default {
  mounted() {
    console.log("ciaociaociao");
    axios.get("http://localhost:8888/php-todo-list-json/")
    .then(response => {
      console.log(response);
      console.log(response.data)
    }
    )
  }
}
</script>

<template>
  <div>
   ciao da Vue
  </div>

</template>

<style scoped>
</style>
