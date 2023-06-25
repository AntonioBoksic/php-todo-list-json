<script>
import axios from 'axios';

export default {
  data() {
    return {
      tasks: [],
      newTask: {
        description: "",
        completed: false
      }
    }
  },
  methods: {
    onSubmit() {
      console.log("cliccato", this.newTask.description);

      const url= "http://localhost:8888/php-todo-list-json/postTask.php";
      const data= this.newTask;
      const headers ={
        headers: { 'Content-type' : 'multipart/form-data'}
      };

      axios.post(url, data, headers)
        .then(response => {
          console.log(response);
          console.log(response.data);

          this.tasks = response.data;

          //svuoto newTask.description
          this.newTask.description = ""
        });
    },
    deleteTask(index) {
      console.log("attivato funzione delete", index);

      const url = "http://localhost:8888/php-todo-list-json/deleteTask.php";
      const data = {"indice": index};
      const headers ={
        headers: { 'Content-type' : 'multipart/form-data'}
      };

      axios.post(url, data, headers)
        .then(response => {
          console.log(response.data);
          this.tasks = response.data;
        })
    }
  },
  mounted() {
    console.log("ciaociaociao");

    axios.get("http://localhost:8888/php-todo-list-json/index.php")
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
  <!-- da qui inizia la lsita -->
  <ul>
    <li
    v-for="(task, index) in tasks" 
    :key="index"
    :class="task.completed==='true' ? 'barrato' : 'nonbarrato'"
    >
    {{task.description }} {{ task.completed }}

    <button type="button" 
    style="color: red;" 
    @click="deleteTask(index)">
    X
    </button>
  
  </li>
  </ul>
  <!-- da qui inizia form -->
  <form 
  @submit.prevent="onSubmit"
  >
  <label for="newtask">name </label>
  <input type="text" name="newtask" id="newtask" v-model="newTask.description">
  <input type="submit" value="create new task">

  </form>

</template>


<style scoped>
ul{
  background-color: white;
  color: black;
  border-radius: 10px;
  list-style: none;
  padding: 0;

  
}

li{
    margin:10px;
    border-bottom: 1px solid black;
  }

  .barrato{
    text-decoration: line-through;
    text-decoration-thickness: 5px;
  }
</style>
