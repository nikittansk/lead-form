<template>
    <div class="list-container">
        <div class="filter">
            <label>Фильтр по городу:</label>
            <select v-model="filterCity" @change="getLeads">
                <option value="">Все города</option>
                <option v-for="city in cities" :key="city" :value="city">{{ city }}</option>
            </select>
        </div>
        <ul class="lead-list">
            <li v-for="lead in leads" :key="lead.id" class="lead-item">
                <span>{{ lead.name }}</span>
                <span>{{ lead.email }}</span>
                <span>{{ lead.phone }}</span>
                <span>{{ lead.city }}</span> 
            </li>
        </ul>
        <button @click="exportLeads">Экспорт в CSV</button>
    </div>
  </template>
  
  <script>
  export default {
    name: 'LeadList',
    data () {
      return {
        leads: [
          {
            name: 'Nikita',
            email: 'test@mail.ru',
            phone: '89293232323',
            city: 'Тула'
          }
        ],
        filterCity: '',
        cities: ['Москва', 'Санкт-Петербург', 'Тула']
      }
    },
    methods: {
      getLeads() {
        console.log(this.filterCity)
      },
  
      exportLeads() {
        
      }
    }
  }
  </script>
  
  <style scoped>
  .list-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
  }
  
  .filter {
    margin-bottom: 20px;
  }
  
  label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
  }
  
  select {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
  }
  
  .lead-list {
    list-style: none;
    padding: 0;
  }
  
  .lead-item {
    display: flex;
    justify-content: space-between;
    padding: 10px;
    background-color: #fff;
    border-bottom: 1px solid #ddd;
  }
  
  .lead-item:nth-child(even) {
    background-color: #f1f1f1;
  }
  
  button {
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 20px;
  }
  
  button:hover {
    background-color: #0056b3;
  }
  </style>