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
    <h1>Todo List</h1>
   
  </div>
  <ul>
    <li
    v-for="(task, index) in tasks" :key="index"
    >
    {{task.description }}
  </li>
  </ul>
  <form >
    
  </form>

</template>


<style scoped>
</style>
