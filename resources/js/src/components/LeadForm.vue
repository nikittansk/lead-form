<template>
  <div class="form-container">
      <form @submit.prevent="submitLead">
        <div class="form-group">
              <label>ФИО:</label>
              <input v-model="formData.name" type="text" required>
          </div>
          <div class="form-group">
              <label>Email:</label>
              <input v-model="formData.email" type="email" required>
          </div>
          <div class="form-group">
            <input v-model="formattedPhone" type="tel" pattern="[0-9]{10}" required>
            <small>Введите 10 цифр без первого символа `+7`</small>
          </div>
          <div class="form-group">
              <label>Город:</label>
              <select v-model="formData.city" required>
                  <option v-for="city in cities" :key="city" :value="city">{{ city }}</option>
              </select>
          </div>
          <button type="submit">Отправить</button>
          <div v-if="message && !isFormBlocked" :class="messageClass">{{ message }}</div>
          <div v-if="isFormBlocked" class="message-error">{{ message }}</div>
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
      isFormBlocked: false,
    }
  },
  computed: {
    messageClass() {
      return this.message ? 'message-success' : 'message-error';
    },
    formattedPhone: {
      get() {
        return this.formData.phone.replace(/^\+7/, '');
      },
      set(value) {
        this.formData.phone = '+7' + value.replace(/\D/g, '');
      }
    }
  },
  methods: {
    async submitLead() {
      try {
        const response = await axios.post("/api/leads", this.formData);
        if (!response.data.message) {
          this.$router.push({ path: "/leads" });
        } else {
          this.message = response.data.message;
        }
      } catch (error) {
          if (error.response.data.blocked) {
            this.isFormBlocked = true;
            this.message = error.response.data.message;
          } else {
            this.message = `Ошибка при отправке данных: ${error.message}`;
          }
        }
    },
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