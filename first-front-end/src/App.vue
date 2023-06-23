<script>
import axios from 'axios';

export default {
  data() {
    return {
      tasks: [],
      newTask: {
        description: ""
      }
    }

  },
  methods: {
    onSubmit() {
      console.log("cliccato", this.newTask.description)

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
  <form 
  @submit.prevent="onSubmit"
  >
  <label for="name">name </label>
  <input type="text" name="name" id="name" v-model="newTask.description">
  <input type="submit" value="create new task">

  </form>

</template>


<style scoped>
ul{
  background-color: white;
  color: black;
  border-radius: 10px;

  li{
    border-bottom: 1px solid black;
  }
}
</style>
