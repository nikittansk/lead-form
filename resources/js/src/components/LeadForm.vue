<template>
  <div class="form-container">
      <form @submit.prevent="submitLead">
          <div class="form-group" v-for="field in fields" :key="field.label">
            <label>{{ field.label }}</label>
            <component :is="field.component" v-model="formData[field.model]" :type="field.type" :required="field.required"/>
          </div>
          <button type="submit">Отправить</button>
          <div v-if="message" :class="messageClass">{{ message }}</div>
      </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'LeadForm',
  data () {
    return {
      formData: {
        name: '',
        email: '',
        phone: '',
        city: '',
      },
      message: '',
      cities: ['Москва', 'Санкт-Петербург', 'Тула'],
      fields: [
        { label: 'ФИО', component: 'input', model: 'name', type: 'text', required: true },
        { label: 'Email', component: 'input', model: 'email', type: 'email', required: true },
        { label: 'Телефон', component: 'input', model: 'phone', type: 'tel', required: true },
        { label: 'Город', component: 'select', model: 'city', type: null, required: true }
      ]
    }
  },
  computed: {
    messageClass() {
      return this.message ? 'message-success' : 'message-error';
    }
  },
  methods: {
    async submitLead() {
      try {
        const response = await axios.post('/api/leads', this.formData);
        if (!response.data.message) {
          this.$router.push({ path: '/leads' });
        } else {
          this.message = response.data.message;
        }
      } catch (error) {
        this.message = 'Ошибка при отправке данных';
      }
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

.message-success {
  margin-top: 15px;
  padding: 10px;
  background-color: #e0ffe0;
  border: 1px solid #b0ffb0;
  border-radius: 4px;
}

.message-error {
  margin-top: 15px;
  padding: 10px;
  background-color: #ffe0e0;
  border: 1px solid #ffb0b0;
  border-radius: 4px;
}
</style>