<template>
    <div>
        <h1>Заполните форму</h1>
        <LeadForm />
    </div>
</template>

<script>
import LeadForm from '@/components/LeadForm.vue';

export default {
    name: 'HomePage',
    components: {
        LeadForm
    }
}
</script>