<template>
  <div class="form-container">
      <form @submit.prevent="submitLead">
          <div class="form-group">
              <label>ФИО:</label>
              <input v-model="name" type="text" equired>
          </div>
          <div class="form-group">
              <label>Email:</label>
              <input v-model="email" type="email" required>
          </div>
          <div class="form-group">
              <label>Телефон:</label>
              <input v-model="phone" type="tel" required>
          </div>
          <div class="form-group">
              <label>Город:</label>
              <select v-model="city" required>
                  <option v-for="city in cities" :key="city" :value="city">{{ city }}</option>
              </select>
          </div>
          <button type="submit">Отправить</button>
          <div v-if="message" class="message">{{ message }}</div>
      </form>
  </div>
</template>

<script>
export default {
  name: 'LeadForm',
  data () {
    return {
      name: '',
      email: '',
      phone: '',
      city: '',
      message: '',
      cities: ['Москва', 'Санкт-Петербург', 'Тула']
    }
  },
  methods: {
    submitLead() {
      console.log(this.name)
    }
  }
}
</script>

<style scoped>
.form-container {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f9f9f9;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.form-group {
  margin-bottom: 15px;
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

input, select {
  width: 100%;
  padding: 8px;
  box-sizing: border-box;
}

button {
  padding: 10px 20px;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}

.message {
  margin-top: 15px;
  padding: 10px;
  background-color: #e0ffe0;
  border: 1px solid #b0ffb0;
  border-radius: 4px;
}
</style>