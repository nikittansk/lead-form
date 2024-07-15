<template>
    <header class="header">
    <nav>
        <ul>
        <li>
            <router-link to="/">Home</router-link>
        </li>
        <li>
            <router-link to="/leads">Leads</router-link>
        </li>
        </ul>
    </nav>
</header>
</template>

<script>
export default {
  name: 'Header'
}
</script>

<style scoped>
.header {
    background-color: #007bff; 
    color: #fff;
    padding: 10px 0;
    text-align: center;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.header h1 {
    margin: 0;
    font-size: 24px;
}

.header nav {
    margin-top: 10px;
}

.header nav ul {
    list-style-type: none;
    padding: 0;
    display: flex;
    justify-content: center;
}

.header nav ul li {
    margin: 0 10px;
}

.header nav ul li a {
    color: #fff;
    text-decoration: none;
    transition: color 0.3s ease;
}

.header nav ul li a:hover {
    color: #f0f0f0;
}
</style>