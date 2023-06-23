<script>
import axios from 'axios';

export default {
  data() {
    return {
      tasks: []
    }

  },
  mounted() {
    console.log("ciaociaociao");

    axios.get("http://localhost:8888/php-todo-list-json/")
      .then(response => {
        console.log(response);
        console.log(response.data);

        this.tasks = response.data;

      });

  }
}
</script>

<template>
  <div>
   ciao da Vue
  </div>
  <ul>
    <li
    v-for="(task, index) in tasks" key="index"
    >
    {{task.description }}
  </li>
  </ul>

</template>


<style scoped>
</style>
